<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(QCODO_INCLUDE_FOLDER . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");

class UserBO {

    public function __construct() {
        
    }
    
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
                $this->lastErrorMessage = "Exception while saving new user.";
                return false;
            }
        }
        return false;
    }
    
    public function loginUser($userTO){
        if($userTO instanceof UserTO){
            $queryResult = DtrcUsers::LoadInTO($userTO->email);
            if(!$queryResult){
                $this->lastErrorMessage = "Login failed. User does not exists.";
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
                        $this->lastErrorMessage = "Login failed. Password error.";
                    }
                }
            }
        }
        else{
            $this->lastErrorMessage = "Input data error";
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
    
}
    
?>