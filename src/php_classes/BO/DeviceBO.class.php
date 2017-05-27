<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once("UserBO.class.php");
require_once(QCODO_INCLUDE_FOLDER . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcDevices.class.php");

class DeviceBO {

    public function __construct() {
        $this->deviceBO = new UserBO();
    }

    private $deviceBO;

    public $lastErrorMessage;
    
    
    public function newDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser) && isset($deviceTO->passUser)){
                //devo fare la login qui prima di creare il device
                $userTO = new UserTO();
                $userTO->email = $deviceTO->emailUser;
                $userTO->pass = $deviceTO->passUser;
                $loginResult = $this->deviceBO->loginUser($userTO);
                if($loginResult){
                    $qcodoEntity = new DtrcDevices();
                    $qcodoEntity->InitDataWithTO($deviceTO);
                    try{
                        $saveResult = $qcodoEntity->Save();
                        if(is_bool($saveResult) && !$saveResult){
                            $this->lastErrorMessage = "Device already exists.";
                            return false;
                        }
                        return true;
                    } catch (Exception $e){
                        //salvo il message dell'exception nel log
                        $this->lastErrorMessage = "Exception while saving new user. ";
                        return false;
                    }
                }
                else{
                    $this->lastErrorMessage = "Unable to perform login. "
                            .$this->deviceBO->lastErrorMessage;
                }
            }
            else{
                $this->lastErrorMessage = "Unable to perform login. Missing user data.";
            }
        }
        if(!isset($this->lastErrorMessage)){
            $this->lastErrorMessage = "Unable to add this new device.";
        }
        return false;
    }
    
    
    public function updateTokenDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser)){
                $qcodoEntity = new DtrcDevices();
                $qcodoEntity->InitDataWithTO($deviceTO);
                
                try{
                    $qcodoEntity->Save(true, true);
                    return true;
                } catch(Exception $e){
                    $this->lastErrorMessage = "Unable to update token.";
                    return false;
                }
                
                
            }
        }
        if(!isset($this->lastErrorMessage)){
            $this->lastErrorMessage = "Unable to update token of this new device.";
        }
        return false;
    }
    
}

?>