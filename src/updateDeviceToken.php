<?php

require_once ("config/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/Device.class.php");
require_once ("php_classes/BO/DeviceBO.class.php");
require_once("./checkAPIKey.php");
require_once (LOG_MODULE);

if(!isset($_POST['apikey']) || !CheckAPIKey($_POST['apikey'])){
    $msg = "API KEY NOT VALID.";
    error($msg);
    $log->lwrite($msg);
    $log->lclose();
    die();
}

if (isset($_POST['data'])) {
    try {
        $deviceTO = Device::getDeviceTOFromJson($_POST['data']);
        $deviceBO = new DeviceBO();
        $result = $deviceBO->updateTokenDevice($deviceTO);

        if ($result) {
            ok();
        }
        else {
            $msg = "Unable to update device token. " . $deviceBO->lastErrorMessage;
            error($msg);
            $log->lwrite($msg);
        }
    } catch (Exception $e) {
        $msg = "Unexpected server error.";
        error($msg);
        $log->lwrite("$msg  Exception : ".$e->getMessage().", ".$e->getTraceAsString());
    }
}
else {
    $msg = "No data passed.";
    error($msg);
    $log->lwrite($msg);
}


