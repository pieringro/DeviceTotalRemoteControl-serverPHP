<?php

require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/Device.class.php");
require_once ("php_classes/BO/DeviceBO.class.php");

require_once("./checkAPIKey.php");

if(!isset($_POST['apikey']) || !CheckAPIKey($_POST['apikey'])){
    error("API KEY NOT VALID.");
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
            error("Unable to update device token. " . $deviceBO->lastErrorMessage);
        }
    } catch (Exception $e) {
        error($e->getMessage());
    }
} else {
    error("No data passed.");
}
?>