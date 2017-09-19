<?php

require_once ("config/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/User.class.php");
require_once ("php_classes/BO/UserBO.class.php");
require_once("./checkAPIKey.php");

if(isset($_POST['apikey']) && !CheckAPIKey($_POST['apikey'])){
    error("API KEY NOT VALID.");
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
                error("Unable to perform login. ".$userBO->lastErrorMessage);
            }
        }
        else{
            error("Unable to perform login. Missing user data.");
        }

        
    } catch (Exception $e) {
        error($e->getMessage());
    }
} else {
    error("No data passed.");
}




?>