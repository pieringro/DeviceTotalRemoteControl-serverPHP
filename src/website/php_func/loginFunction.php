<?php
require_once ("../../php_func/constants.php");
require_once (ROOT_WEB . "/php_func/clientComunication.php");
require_once (ROOT_WEB . "/php_classes/bean/User.class.php");
require_once (ROOT_WEB . "/php_classes/BO/UserBO.class.php");


if (isset($_POST['email']) && isset($_POST['pass'])) {
    try {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dataJson = "{ \"email\":\"$email\", \"pass\":\"$pass\" }";
        
        $userTO = User::getUserTOFromJson($dataJson);
        if(isset($userTO->email) && isset($userTO->pass)){
            $userBO = new UserBO();
            $result = $userBO->loginUser($userTO);

            if ($result) {
                header("Location: ../HomePage.php");
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

