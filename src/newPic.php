<?php

/*
 * Questo script prende in input un json con le informazioni di un nuova immagine
 * associata a un determinato id device. In piu' il file inviato con multipart/form-data
 *
 * Formato json richiesto in input
  {
      "device_id" : "<id_del_dispositivo>"
  }
 *
 * Prima di salvare il file sul server, deve effettuare una validazione sui dati
 *
 * A procedimento terminato restituisce un json
  {
      "error" : false
  }
  * oppure
  {
      "error" : true,
      "message" : "Messaggio di errore"
  }
*/

require_once ("config/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_func/receiveFileUploaded.php");
require_once ("php_classes/bean/Picture.class.php");
require_once ("php_classes/BO/PictureBO.class.php");
require_once("./checkAPIKey.php");
require_once (LOG_MODULE);

if(isset($_POST['apikey']) && !CheckAPIKey($_POST['apikey'])){
    $msg = "API KEY NOT VALID.";
    error($msg);
    $log->lwrite($msg);
    $log->lclose();
    die();
}


if (isset($_POST['data']) && isset($_FILES['file'])) {
    try {
        
        $pictureTO = Picture::getPictureTOFromJson($_POST['data']);
        
        if(isset($pictureTO->deviceId)){
            $filePathWeb = doUploadNow($pictureTO->deviceId);
            $pictureTO->path = $filePathWeb;
            $pictureBO = new PictureBO();
            $result = $pictureBO->newPicture($pictureTO);
            
            if ($result) {
                ok();
            }
            else{
                $msg = "Unable to create new picture file. ".$pictureBO->lastErrorMessage;
                error($msg);
                $log->lwrite($msg);
            }
        }
        else{
            $msg = "Missing device identifier.";
            error($msg);
            $log->lwrite($msg);
        }
                
    } catch (Exception $e){
        $msg = "Unexpected server error.";
        error($msg);
        $log->lwrite("$msg  Exception : ".$e->getMessage().", ".$e->getTraceAsString());
    }
}
else {
    if (isset($_SERVER["CONTENT_LENGTH"])){
        if($_SERVER["CONTENT_LENGTH"]>((int)ini_get('post_max_size')*1024*1024)){
            $msg = "File too big.";
            error($msg);
            $log->lwrite($msg);
            $log->lclose();
            die();
        }
    }
    $msg = "No file passed";
    error($msg);
    $log->lwrite($msg);
}

$log->lclose();
