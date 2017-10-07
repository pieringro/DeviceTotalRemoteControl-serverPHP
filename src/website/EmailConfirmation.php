<?php
require_once('../config/constants.php');
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once(ROOT_WEB.'/engine/resources/ResourcesManager.class.php');


//ricevo in GET una stringa criptata
$cryptedString = $_GET[EMAIL_KEY_NAME];

//provo a decriptarla usando ogni uuid della tabella dtrc_pending_email_user_confirmation
//come chiave, e come valore l'email corrispondente
if(isset($cryptedString)){
    $userBO = new UserBO();
    $match = $userBO->decrypt($cryptedString);
    if($match){
        $msg = ResourcesManager::getResource("user_activated");
        header("Location: LoginPage.php?message=$msg");
    }
    else{
        header("Location: LoginPage.php");
    }
}

?>
