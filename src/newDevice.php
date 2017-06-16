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

require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_classes/bean/Device.class.php");
require_once ("php_classes/BO/DeviceBO.class.php");



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
            error($deviceBO->lastErrorMessage);
        }
    } catch (Exception $e) {
        //meglio scrivere nel log il messaggio di eccezione $e->getMessage()
        //error($e->getMessage());
        error("Unexpected server error.");
    }
} else {
    error("No data passed.");
}
?>