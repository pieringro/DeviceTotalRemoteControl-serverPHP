<?php
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
        if(($userTO instanceof UserTO)){
            //logica di criptazione della password da salvare
            $userTO->pass = @crypt($userTO->pass);
            $qcodoEntity = new DtrcUsers();
            $qcodoEntity->InitDataWithTO($userTO);
            try{
                $qcodoEntity->Save();
                return true;
            } catch (Exception $e){
                //salvo il message dell'exception nel log
                $msg = "Exception while saving new user.";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - ".$e->getMessage()." , ".$e->getTraceAsString()." User: $userTO");
                return false;
            }
        }
        return false;
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
                        //login riuscita. Ora si inizializza la sessione
                        //setto la lifetime del cookie di sessione
                        session_set_cookie_params(0);
                        @session_start();
                        $_SESSION['user'] = serialize($queryResult);
                        return true;
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
    
    public function __destruct() {
        $this->log->lclose();
    }
    
}
    
?>