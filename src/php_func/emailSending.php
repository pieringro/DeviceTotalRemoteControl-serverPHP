<?php
if(!defined('ROOT_WEB')){
    require_once ("../config/constants.php");
}
require_once (ROOT_WEB . '/engine/resources/ResourcesManager.class.php');
require_once (LOG_MODULE);

define('FROM_EMAIL_ADDRESS', 'noreply-dtrc@altervista.org');
define('REPLY_TO_EMAIL_ADDRESS', 'noreply-dtrc@altervista.org');

function sendConfirmationEmail($to, $link, &$msg){
    
    $subject = ResourcesManager::getResource("email_subject");
    $headers = 'From: ' . FROM_EMAIL_ADDRESS . "\r\n" .
            'Reply-To: ' . REPLY_TO_EMAIL_ADDRESS . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
    $bodyMessage = sprintf(ResourcesManager::getResource("email_body"), $to, $link);
    try{
        $result = mail($to, $subject, $bodyMessage, $headers);
    } catch (Exception $e) {
        $msg = ResourcesManager::getResource("email_general_error");
        error($msg);
        $log->lwrite("$msg - Exception: ".$e->getMessage()." , ".$e->getTraceAsString());
        $result = false;
    }
    
    return $result;
}



