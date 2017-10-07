<?php
require_once ("../../config/constants.php");
require_once (ROOT_WEB . "/php_func/clientComunication.php");
require_once (ROOT_WEB . "/php_classes/bean/User.class.php");
require_once (ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once (ROOT_WEB.'/engine/resources/ResourcesManager.class.php');
require_once (LOG_MODULE);


$result = true;
$msg = "";
if (isset($_POST['email']) && isset($_POST['pass'])) {
    try {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dataJson = "{ \"email\":\"$email\", \"pass\":\"$pass\" }";
        
        $userTO = User::getUserTOFromJson($dataJson);
        if(isset($userTO->email) && isset($userTO->pass)){
            $userBO = new UserBO();
            $resultLogin = $userBO->loginUser($userTO);

            if($resultLogin === "inactive"){
                $result = false;
                $msg = ResourcesManager::getResource("user_inactive");
            }
            else if ($resultLogin) {
                $result = true;
                header("Location: ../HomePage.php");
            }
            else{
                $msgForLog = "Unable to perform login. ".$userBO->lastErrorMessage;
                error($msgForLog);
                $log->lwrite($msgForLog);
                $result = false;
                $msg = ResourcesManager::getResource("login_failed");
            }
        }
        else {
            $msgForLog = "Unable to perform login. Missing user data.";
            error($msgForLog);
            $log->lwrite($msgForLog);
            $result = false;
            $msg = ResourcesManager::getResource("login_failed");
        }
    } catch (Exception $e) {
        $msgForLog = "Unexpected server error.";
        error($msgForLog);
        $log->lwrite("$msgForLog - Exception: ".$e->getMessage()." , ".$e->getTraceAsString());
        $result = false;
        $msg = ResourcesManager::getResource("server_error");
    }
} else {
    $msgForLog = "No data passed.";
    error($msgForLog);
    $log->lwrite($msgForLog);
    $result = false;
    $msg = ResourcesManager::getResource("login_failed");
}

$log->lclose();

if($result){
    header("Location: ../HomePage.php");
}
else{
    header("Location: ../LoginPage.php?message=$msg");
}
