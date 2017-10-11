<?php
require_once ("config/constants.php");
require_once (ROOT_WEB . "/php_func/clientComunication.php");
require_once (ROOT_WEB . "/php_func/emailSending.php");
require_once (ROOT_WEB . "/php_classes/bean/User.class.php");
require_once (ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once (ROOT_WEB . '/engine/resources/ResourcesManager.class.php');
require_once (ROOT_WEB . "/checkAPIKey.php");
require_once (LOG_MODULE);

if(isset($_POST['apikey']) && !CheckAPIKey($_POST['apikey'])){
    $msg = "API KEY NOT VALID.";
    error($msg);
    $log->lwrite($msg);
    $log->lclose();
    die();
}

if (isset($_POST['data'])) {
    try {
        $userTO = User::getUserTOFromJson($_POST['data']);

        if(isset($userTO->email) && isset($userTO->pass)){
            $email = $userTO->email;
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $userBO = new UserBO();
                $result = $userBO->newUser($userTO);

                if ($result) {
                    $link = $userBO->getLinkToActivateThisUser($email);
                    $result = sendConfirmationEmail($email, $link, $msg);
                    if($result){
                        $msg = ResourcesManager::getResource("just_sign_up_message");
                        ok();
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
        $log->lwrite("$msg  Exception : ".$e->getMessage().", ".$e->getTraceAsString());
    }
}
else {
    $msg = "No data passed.";
    error($msg);
    $log->lwrite($msg);
}

$log->lclose();
