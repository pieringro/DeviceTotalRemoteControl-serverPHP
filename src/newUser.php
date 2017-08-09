<?php
require_once ("php_func/constants.php");
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
            $result = $userBO->newUser($userTO);
            
            if ($result) {
                ok();
            }
            else{
                error("Unable to create new user. ".$userBO->lastErrorMessage);
            }
        }

    } catch (Exception $e) {
        error($e->getMessage());
    }
} else {
    error("No data passed.");
}



?>