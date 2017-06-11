<?php
if(isset($_POST['deviceToken']) && isset($_POST['params'])){
    require_once('../../php_func/constants.php');
    require_once(ROOT_WEB.'/php_func/firebaseComunication.php');
    
    $deviceToken = $_POST['deviceToken'];
    $params = json_decode($_POST['params']);
    
    $firebase = new Firebase();
    $dataParams = array(
        "CommandId" => FirebaseCommandsKey::TAKE_PICTURE,
        "FrontPic" => $params->FrontPic,
        "BackPic" => $params->BackPic
    );
    $result = $firebase->send($deviceToken, $dataParams);
    
    echo $result;
    
}





?>