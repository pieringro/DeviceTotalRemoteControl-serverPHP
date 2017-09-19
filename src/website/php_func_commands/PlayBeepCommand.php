<?php

if(isset($_POST['deviceToken'])){
    require_once('../../config/constants.php');
    require_once(ROOT_WEB.'/php_func/firebaseComunication.php');
    $deviceToken = $_POST['deviceToken'];
    
    $firebase = new Firebase();
    $dataParams = array(
        "CommandId" => FirebaseCommandsKey::PLAY_BEEP
    );
    $result = $firebase->send($deviceToken, $dataParams);
    
    echo $result;
    
}





?>