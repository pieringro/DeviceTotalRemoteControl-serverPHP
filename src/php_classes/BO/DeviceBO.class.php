<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");

class DeviceBO {

    public function __construct() {
        $this->dao = AbstractDAO::getIstanceDAO("device");
        $this->userDao = AbstractDAO::getIstanceDAO("user");
    }

    private $dao;
    private $userDao;
    
    
    public function newDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser) && isset($deviceTO->passUser)){
                //devo fare la login qui prima di creare il device
                $userTO = new UserTO();
                $userTO->email = $deviceTO->emailUser;
                $userTO->pass = $deviceTO->passUser;
                $loginSuccessful = $this->userDao->read($userTO);
                if($loginSuccessful){
                    return $this->dao->create($deviceTO);
                }
            }
        }
        return false;
    }
    
    
    public function updateTokenDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            if(isset($deviceTO->emailUser)){
                return $this->dao->update($deviceTO, $deviceTO);
            }
        }
        return false;
    }
    
}

?>