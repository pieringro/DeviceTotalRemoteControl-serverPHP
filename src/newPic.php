<?php

/*
 * Questo script prende in input un json con le informazioni di un nuova immagine
 * associata a un determinato id device. In piu' il file inviato con multipart/form-data
 *
 * Formato json richiesto in input
  {
      "device_tokenFirebase" : "<token_firebase_del_dispositivo>",
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

require_once ("php_func/constants.php");
require_once("php_func/clientComunication.php");
require_once ("php_classes/bean/Picture.class.php");
require_once ("php_classes/BO/PictureBO.class.php");


function doUploadNow() {

    // verifico che il file sia stato caricato
    if (!is_uploaded_file($_FILES['file']['tmp_name']) ||
            $_FILES['file']['error'] > 0) {
        throw new Exception("Error uploading file. error=".$_FILES['file']['error']);
    }

    $filePath = FILES_FOLDER."/".$_FILES['file']['name'];
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        $filePathWeb = FILES_FOLDER_WEB."/".$_FILES['file']['name'];
        return $filePathWeb;
    }
    else{
        throw new Exception("Unable to upload file.");
    }
}


//-------------- MAIN ---------------


if (isset($_POST['data']) && isset($_FILES['file'])) {
    try {
        $filePathWeb = doUploadNow();
        //in $filePathWeb ora ho l'indirizzo del file salvato
        //devo salvare sul db le informazioni $filePathWeb e associarle al device
        $pictureTO = Picture::getPictureTOFromJson($_POST['data']);
        $pictureTO->path = $filePathWeb;
        
        if(isset($pictureTO->deviceId)){
            $pictureBO = new PictureBO();

            $result = $pictureBO->newPicture($pictureTO);
            
            if ($result) {
                ok();
            }
            else{
                error("Unable to create new picture. ".$pictureBO->lastErrorMessage);
            }
        }
        
        ok();
        
    } catch (Exception $e){
        error($e->getMessage());
    }
}
else {
    if (isset($_SERVER["CONTENT_LENGTH"])){
        if($_SERVER["CONTENT_LENGTH"]>((int)ini_get('post_max_size')*1024*1024)){
            error("File too big.");
        }
    }

    error("No file passed.");
}
?>
