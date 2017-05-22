<?php

/*
 * Questo script prende in input un json con le informazioni di un nuovo device
 * da associare a un utente (identificato via email)
 *
 * Formato json richiesto in input
 *
  {
  "Device_tokenFirebase" : "<token_firebase_del_dispositivo>",
  "Device_id" : "<id_del_dispositivo>"
  "Email" : "<email_dell_utente">
  "Pass" : "<password_dell_utente">
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
    } catch (Exception $e) {
        error($e->getMessage());
    }
} else {
    error("No data passed.");
}
?>