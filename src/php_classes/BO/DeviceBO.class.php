<?php
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once("UserBO.class.php");
require_once(__INCLUDES__ . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcDevices.class.php");
require_once(LOG_MODULE);

class DeviceBO {

    public function __construct() {
        $this->userBO = new UserBO();
        $this->log = Log::getInstance();
    }
    private $log;

    private $userBO;
    public $lastErrorMessage;
    
    public function newDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser) && isset($deviceTO->passUser)){
                //devo fare la login qui prima di creare il device
                $userTO = new UserTO();
                $userTO->email = $deviceTO->emailUser;
                $userTO->pass = $deviceTO->passUser;
                $loginResult = $this->userBO->loginUser($userTO);
                if($loginResult){
                    $qcodoEntity = new DtrcDevices();
                    $qcodoEntity->InitDataWithTO($deviceTO);
                    try{
                        $saveResult = $qcodoEntity->Save();
                        if(is_bool($saveResult) && !$saveResult){
                            $this->lastErrorMessage = DEVICE_EXISTS;
                            return false;
                        }
                        return true;
                    } catch (Exception $e){
                        //salvo il message dell'exception nel log
                        $msg = "Exception while saving new device. ";
                        $this->lastErrorMessage = $msg;
                        $this->log->lwrite("$msg - Exception: ".$e->getMessage()." "
                                .$e->getTraceAsString()." User: $userTO");
                        return false;
                    }
                }
                else{
                    $msg = "Unable to perform login. .$this->userBO->lastErrorMessage";
                    $this->lastErrorMessage = $msg;
                    $this->log->lwrite("$msg - User: $userTO");
                }
            }
            else{
                $msg = "Unable to perform login. Missing user data.";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - Device: $deviceTO");
            }
        }
        if(!isset($this->lastErrorMessage)){
            $msg = "Unable to add this new device.";
            $this->lastErrorMessage = $msg;
            error($msg);
            $this->log->lwrite($msg);
        }
        return false;
    }
    
    
    public function updateTokenDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser)){
                $qcodoEntity = new DtrcDevices();
                $qcodoEntity->InitDataWithTO($deviceTO);
                
                try{
                    $updateResult = $qcodoEntity->Save(false, true);
                    if(is_bool($updateResult) && !$updateResult){
                        $msg = "Device does not exist.";
                        $this->lastErrorMessage = $msg;
                        error($msg);
                        $log->lwrite($msg);
                        return false;
                    }
                    return true;
                } catch(Exception $e){
                    $msg = "Unable to update token.";
                    $this->lastErrorMessage = $msg;
                    error($msg." Exception: ".$e->getMessage());
                    $log->lwrite($msg);
                    return false;
                }
            }
        }
        if(!isset($this->lastErrorMessage)){
            $msg = "Unable to update token for this device.";
            $this->lastErrorMessage = $msg;
            error($msg);
            $log->lwrite($msg);
        }
        return false;
    }
    
    
    public function getTokenOfThisDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->device_id)){
                $dtrcDevice = DtrcDevices::LoadFromId($deviceTO->device_id);
                return $dtrcDevice->TokenFirebase;
            }
        }
        return null;
    }
    
    
    public function __destruct() {
        $this->log->lclose();
    }
}

?>