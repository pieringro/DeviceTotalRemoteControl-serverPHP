<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");

class UserBO {

    public function __construct() {
        $this->dao = AbstractDAO::getIstanceDAO("user");
    }

    private $dao;
    
    public $lastErrorMessage;
    
    
    public function newUser($userTO){
        if(($userTO instanceof UserTO)){
            return $this->dao->create($userTO);
        }
        return false;
    }
    
    
    public function loginUser($userTO){
        if(($userTO instanceof UserTO)){
            $queryResult = $this->dao->read($userTO);
            if(!$queryResult){
                $this->lastErrorMessage = "Login failed.";
            }
            else{
                return true;
            }
        }
        else{
            $this->lastErrorMessage = "Input data error";
        }
        return false;
    }
    
}
    
?>