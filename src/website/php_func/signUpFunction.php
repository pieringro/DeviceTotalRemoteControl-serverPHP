<?php
require_once ("../../config/constants.php");
require_once (ROOT_WEB . "/php_func/clientComunication.php");
require_once (ROOT_WEB . "/php_classes/bean/User.class.php");
require_once (ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once (LOG_MODULE);


if (isset($_POST['email']) && isset($_POST['pass'])) {
    try {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if(isset($_POST['lang'])){
            $lang = $_POST['lang'];
        }
        else{
            $lang = "English";
        }
        
        $dataJson = "{ \"email\":\"$email\", \"pass\":\"$pass\", \"lang\":\"$lang\" }";
        
        $userTO = User::getUserTOFromJson($dataJson);
        if(isset($userTO->email) && isset($userTO->pass)){
            $userBO = new UserBO();
            $result = $userBO->newUser($userTO);
            
            if ($result) {
                header("Location: ../LoginPage.php?message=Registrazione avvenuta con successo, accedere con i nuovi dati.");
            }
            else{
                $msg = "Unable to create new user. ".$userBO->lastErrorMessage;
                error($msg);
                $log->lwrite($msg);
            }
        }

    } catch (Exception $e) {
        $msg = "Unexpected server error.";
        error($msg);
        $log->lwrite("$msg - Exception: ".$e->getMessage()." , ".$e->getTraceAsString());
    }
} else {
    $msg = "No data passed.";
    error($msg);
    $log->lwrite($msg);
}

$log->lclose();

