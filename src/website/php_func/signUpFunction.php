<?php
require_once ("../../config/constants.php");
require_once (ROOT_WEB . "/php_func/clientComunication.php");
require_once (ROOT_WEB . "/php_classes/bean/User.class.php");
require_once (ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once (ROOT_WEB . '/engine/resources/ResourcesManager.class.php');
require_once (ROOT_WEB . "/php_func/emailSending.php");
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
        if($userTO instanceof UserTO && isset($userTO->email) && isset($userTO->pass)){
            $email = $userTO->email;
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $userBO = new UserBO();
                $result = $userBO->newUser($userTO);

                if ($result) {
                    $link = $userBO->getLinkToActivateThisUser($email);
                    $result = sendConfirmationEmail($email, $link, $msg);
                    if($result){
                        $msg = ResourcesManager::getResource("just_sign_up_message");
                        header("Location: ../LoginPage.php?message=$msg");
                    }
                }
                else{
                    if($userBO->lastErrorMessage == USER_ALREADY_EXISTS){
                        //l'utente gia' esiste
                        $msg = ResourcesManager::getResource("user_already_exists");
                    }
                    else{
                        //errore generico
                        $msg = "Unable to create new user. ".$userBO->lastErrorMessage;
                    }
                    
                    error($msg);
                    $log->lwrite($msg);
                }
            }
            else{
                $msg = "Validation error email $email";
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

