<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once("UserBO.class.php");

class DeviceBO {

    public function __construct() {
        $this->dao = AbstractDAO::getIstanceDAO("device");
        $this->userBO = new UserBO();
    }

    private $dao;
    private $userBO;

    public $lastErrorMessage;
    
    
    public function newDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser) && isset($deviceTO->passUser)){
                //devo fare la login qui prima di creare il device
                $userTO = new UserTO();
                $userTO->email = $deviceTO->emailUser;
                $userTO->pass = $deviceTO->passUser;
                $loginSuccessful = $this->userBO->loginUser($userTO);
                if($loginSuccessful){
                    return $this->dao->create($deviceTO);
                }
                else{
                    $this->lastErrorMessage = "Unable to perform login. "
                            .$this->userBO->lastErrorMessage;
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
                return $this->dao->update($deviceTO, $deviceTO);
            }
        }
        if(!isset($this->lastErrorMessage)){
            $this->lastErrorMessage = "Unable to update token of this new device.";
        }
        return false;
    }
    
}

?>