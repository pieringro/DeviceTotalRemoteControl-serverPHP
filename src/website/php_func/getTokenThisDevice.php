<?php

require_once ("../../php_func/constants.php");
require_once (ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once (ROOT_WEB . "/php_classes/BO/DeviceBO.class.php");


$output = "";

if (isset($_POST['deviceId'])) {
    $deviceId = $_POST['deviceId'];
    $_SESSION['idDevice'] = $deviceId;
    $deviceBO = new DeviceBO();
    $deviceTO = new DeviceTO();
    $deviceTO->device_id = $deviceId;
    $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
    $output = "{
        \"deviceToken\" : \"$deviceToken\" ,
        \"deviceId\" : \"$deviceId\"
    }";
}

echo $output;