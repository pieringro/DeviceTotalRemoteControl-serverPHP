<?php

/*
 * Questo script prende in input un json con le informazioni di un nuovo device
 * da associare a un utente (identificato via email)
 *
 * Formato json richiesto in input
 *
  {
    "device_tokenFirebase" : "<token_firebase_del_dispositivo>",
    "device_id" : "<id_del_dispositivo>",
    "emailUser" : "ciccio@lina.cippa",
    "passUser" : "cavallo"
  }

  Il Device_tokenFirebase è opzionale, l'utente può associare il dispositivo anche se non ha ancora ottenuto
  il token da firebase.
 */

require_once ("config/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/Device.class.php");
require_once ("php_classes/BO/DeviceBO.class.php");
require_once ("./checkAPIKey.php");
require_once (LOG_MODULE);

if(isset($_POST['apikey']) && !CheckAPIKey($_POST['apikey'])){
    $msg = "API KEY NOT VALID.";
    error($msg);
    $log->lwrite($msg);
    $log->lclose();
    die();
}


//-------------- MAIN ---------------
if (isset($_POST['data'])) {
    try {
        $deviceTO = Device::getDeviceTOFromJson($_POST['data']);
        $deviceBO = new DeviceBO();
        $result = $deviceBO->newDevice($deviceTO);

        if ($result) {
            ok();
        }
        else{
            if($deviceBO->lastErrorMessage === DEVICE_EXISTS){
                $msg = $deviceBO->lastErrorMessage;
            }
            else{
                $msg = "Error while creating new device. ".$deviceBO->lastErrorMessage;
                $log->lwrite("$msg");
            }
            error($msg);
        }
    } catch (Exception $e) {
        //meglio scrivere nel log il messaggio di eccezione $e->getMessage()
        $msg = "Unexpected server error.";
        error($msg);
        $log->lwrite($msg." Exception : ".$e->getMessage()." , ".$e->getTraceAsString());
    }
} else {
    $msg = "No data passed.";
    error($msg);
    $log->lwrite($msg);
}

$log->lclose();
