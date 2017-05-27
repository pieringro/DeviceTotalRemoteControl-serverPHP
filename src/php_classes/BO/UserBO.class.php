<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
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
            $qcodoEntity->Email = $userTO->email;
            $qcodoEntity->Pass = $userTO->pass;
            
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
            $queryResult = DtrcUsers::Load($userTO->email);
            if(!$queryResult){
                $this->lastErrorMessage = "Login failed. User does not exists.";
            }
            else{
                if($queryResult instanceof UserTO){
                    if(hash_equals($queryResult->pass, crypt($userTO->pass, $queryResult->pass))){
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
}
    
?>