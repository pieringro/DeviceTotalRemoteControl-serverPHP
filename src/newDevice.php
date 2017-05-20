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
  }
 */

require_once ("php_classes/bean/Device.class.php");
require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");



//-------------- MAIN ---------------
if (isset($_POST['data'])){
    
    
    
}


?>