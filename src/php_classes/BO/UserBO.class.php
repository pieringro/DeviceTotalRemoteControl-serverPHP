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
            //logica di criptazione della password
            $userTO->pass = crypt($userTO->pass);
            return $this->dao->create($userTO);
        }
        return false;
    }
    
    
    public function loginUser($userTO){
        if($userTO instanceof UserTO){
            $queryResult = $this->dao->read($userTO);
            if(!$queryResult){
                $this->lastErrorMessage = "Login failed.";
            }
            else{
                if($queryResult instanceof UserTO){
                    if(hash_equals($queryResult->pass, crypt($userTO->pass, $queryResult->pass))){
                        return true;
                    }
                    else{
                        $this->lastErrorMessage = "Login failed.";
                    }
                }
            }
        }
        else{
            $this->lastErrorMessage = "Input data error";
        }
        return false;
    }
    
}
    
?>