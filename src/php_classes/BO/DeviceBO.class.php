<?php


require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");

class DeviceBO {

    public function __construct() {
        $this->dao = AbstractDAO::getIstanceDAO("device");
    }

    private $dao;
    
    
    public function newDevice($deviceTO){
        if(($deviceTO instanceof DeviceTO)){
            return $this->dao->create($deviceTO);
        }
    }
    
}


?>