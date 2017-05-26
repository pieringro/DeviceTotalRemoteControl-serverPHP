<?php
require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/User.class.php");
require_once ("php_classes/BO/UserBO.class.php");


if (isset($_POST['data'])) {
    try {
        $userTO = User::getUserTOFromJson($_POST['data']);

        //logica di criptazione della password
        if(isset($userTO->email) && isset($userTO->pass)){
            $hashed_password = crypt($userTO->pass);
            $userTO->pass = $hashed_password;

            $userBO = new UserBO();
            $result = $userBO->newUser($userTO);
            
            if ($result) {
                ok();
            }
            else{
                error("Unable to create new user.");
            }
        }

    } catch (Exception $e) {
        error($e->getMessage());
    }
} else {
    error("No data passed.");
}



?>