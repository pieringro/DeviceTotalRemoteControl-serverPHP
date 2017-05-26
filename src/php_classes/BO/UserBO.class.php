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

            //la password dovrebbe essere gia' criptata!
            
            if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
                echo "Password verified!";
            }

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