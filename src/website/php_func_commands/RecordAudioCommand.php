<?php
if(isset($_POST['deviceToken']) && isset($_POST['params'])){
    require_once('../../config/constants.php');
    require_once(ROOT_WEB.'/php_func/firebaseComunication.php');
    
    $deviceToken = $_POST['deviceToken'];
    $params = json_decode($_POST['params']);
    
    $firebase = new Firebase();
    $dataParams = array(
        "CommandId" => FirebaseCommandsKey::RECORD_AUDIO,
        "Timer" => $params->Timer,
    );
    $result = $firebase->send($deviceToken, $dataParams);
    
    echo $result;
    
}





?>