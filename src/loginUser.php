<?php

require_once ("config/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/User.class.php");
require_once ("php_classes/BO/UserBO.class.php");
require_once("./checkAPIKey.php");
require_once(LOG_MODULE);

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
            $userBO = new UserBO();
            $result = $userBO->loginUser($userTO);

            if ($result) {
                ok();
            }
            else{
                $msg = "Unable to perform login. ".$userBO->lastErrorMessage;
                error($msg);
                $log->lwrite($msg);
            }
        }
        else{
            $msg = "Unable to perform login. Missing user data.";
            error($msg);
            $log->lwrite($msg);
        }
        
    } catch (Exception $e) {
        $msg = "Unexpected server error.";
        error($msg);
        $log->lwrite("$msg  Exception : ".$e->getMessage().", ".$e->getTraceAsString());
    }
} else {
    $msg = "No data passed.";
    error($msg);
    $log->lwrite($msg);
}

$log->lclose();
