<?php
if(!defined('ROOT_WEB')){
    require_once ("../../config/constants.php");
}
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(__INCLUDES__ . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");
require(LOG_MODULE);

class UserBO {

    public function __construct() {
        $this->log = Log::getInstance();
    }
    private $log;
    
    public $lastErrorMessage;
    
    public function newUser($userTO){
        $result = true;
        
        if(($userTO instanceof UserTO)){
            
            //controllo che l'utente non esista gia'
            $otherUser = DtrcUsers::LoadByEmail($userTO->email);
            if((isset($otherUser) && $otherUser instanceof DtrcUsers)){
                $msg = USER_ALREADY_EXISTS;
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg ($userTO)");
                $result = false;
            }
            
            //effettua creazione record utente
            if($result){
                //logica di criptazione della password da salvare
                $userTO->pass = @crypt($userTO->pass);
                $dtrcUser = new DtrcUsers();
                $dtrcUser->InitDataWithTO($userTO);
                try{
                    $dtrcUser->Save();
                    $result = true;
                } catch (Exception $e){
                    //salvo il message dell'exception nel log
                    $msg = "Exception while saving new user.";
                    $this->lastErrorMessage = $msg;
                    $this->log->lwrite("$msg - ".$e->getMessage()." , ".$e->getTraceAsString()." User: $userTO");
                    $result = false;
                }
            }
            
            //crea una corrispondenza su DtrcPendingEmailUserConfirmation
            if($result){
                $dtrcPendingEmail = new DtrcPendingEmailUserConfirmation();
                $dtrcPendingEmail->EmailUser = $userTO->email;
                try{
                    $dtrcPendingEmail->Save();
                    $result = true;
                } catch (Exception $e){
                    //salvo il message dell'exception nel log
                    $msg = "Exception while saving new pending email for new user.";
                    $this->lastErrorMessage = $msg;
                    $this->log->lwrite("$msg - ".$e->getMessage()." , ".$e->getTraceAsString()." User: $userTO");
                    $result = false;
                }
            }
        }
        return $result;
    }
    
    public function activeUser($userTO_or_email){
        $result = false;
        if(($userTO_or_email instanceof UserTO)){
            try{
                $result = DtrcUsers::ActiveUser($userTO_or_email->email);
            } catch (Exception $e) {
                $msg = "Exception while activating user ".$userTO_or_email->email.".";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - ".$e->getMessage()." , ".$e->getTraceAsString()." User: $userTO_or_email");
                $result = false;
            }
        }
        else if(is_string($userTO_or_email)){
            try{
                $result = DtrcUsers::ActiveUser($userTO_or_email);
            } catch (Exception $e) {
                $msg = "Exception while activating user {$userTO_or_email}.";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - ".$e->getMessage()." , ".$e->getTraceAsString()." User: $userTO_or_email");
                $result = false;
            }
        }
        return $result;
    }
    
    public function loginUser($userTO){
        if($userTO instanceof UserTO){
            $queryResult = DtrcUsers::LoadInTO($userTO->email);
            if(!$queryResult){
                $msg = "Login failed. User ".$userTO->email." does not exists.";
                $this->lastErrorMessage = $msg;
            }
            else{
                if($queryResult instanceof UserTO){
                    if(hash_equals($queryResult->pass, crypt($userTO->pass, $queryResult->pass))){
                        //controlli se l'utente sia attivo
                        if($queryResult->inactive){
                            //login riuscita, ma utente inattivo
                            return "inactive";
                        }
                        else{
                            //login riuscita, utente attivo. Inizializza la sessione
                            //setto la lifetime del cookie di sessione
                            session_set_cookie_params(0);
                            @session_start();
                            $_SESSION['user'] = serialize($queryResult);
                            return true;
                        }
                    }
                    else{
                        $msg = "Login failed. Password error for user ".$userTO->email;
                        $this->lastErrorMessage = $msg;
                    }
                }
            }
        }
        else{
            $msg = "Input data error";
            $this->lastErrorMessage = $msg;
            $this->log->lwrite("$msg - Data passed: $userTO");
        }
        return false;
    }
    
    public function getDevicesToFromUser($userTO){
        if($userTO instanceof UserTO){
            $dtrcUser = DtrcUsers::Load($userTO->email);
            if(isset($dtrcUser) && $dtrcUser instanceof DtrcUsers){
                $dtrcDevicesList = $dtrcUser->GetDtrcDevicesAsEmailUserArray();
                $devicesTOList = array();
                foreach($dtrcDevicesList as $aDtrcDevice){
                    $deviceTO = new DeviceTO();
                    $deviceTO->device_id = $aDtrcDevice->Id;
                    $deviceTO->device_tokenFirebase = $aDtrcDevice->TokenFirebase;
                    $deviceTO->emailUser = $aDtrcDevice->EmailUser;
                    $devicesTOList[] = $deviceTO;
                }
                return $devicesTOList;
            }
        }
        return null;
    }
    
    
    /**
     * Prendo il uuid memorizzato nella tabella dtrc_pending_email_user_confirmation
     * lo uso per criptare una stringa (chiave uuid, valore email)
     * creo il link alla pagina EmailConfirmation, alla quale passo in GET la stringa
     */
    public function getLinkToActivateThisUser($emailUser){
        $link = "";
        $dtrcPendingEmail = DtrcPendingEmailUserConfirmation::LoadFromEmailUser($emailUser);
        if(isset($dtrcPendingEmail) && $dtrcPendingEmail instanceof DtrcPendingEmailUserConfirmation){
            $cryptString = @crypt($dtrcPendingEmail->EmailUser, $dtrcPendingEmail->Id);
            $link = sprintf("%s?%s=%s", EMAIL_CONFIRMATION_FUNCTION, EMAIL_KEY_NAME, $cryptString);
        }
        return $link;
    }
    
    public function __destruct() {
        $this->log->lclose();
    }
    
}
  


