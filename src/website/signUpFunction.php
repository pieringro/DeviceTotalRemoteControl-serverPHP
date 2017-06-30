<?php
require_once ("../php_func/constants.php");
require_once ("../php_func/clientComunication.php");
require_once ("../php_classes/bean/User.class.php");
require_once ("../php_classes/BO/UserBO.class.php");


if (isset($_POST['email']) && isset($_POST['pass'])) {
    try {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dataJson = "{ \"email\":\"$email\", \"pass\":\"$pass\" }";
        
        $userTO = User::getUserTOFromJson($dataJson);
        if(isset($userTO->email) && isset($userTO->pass)){
            $userBO = new UserBO();
            $result = $userBO->newUser($userTO);
            
            if ($result) {
                header("Location: LoginPage.php");
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