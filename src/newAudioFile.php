<?php

require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_func/receiveFileUploaded.php");
require_once ("php_classes/bean/AudioFile.class.php");
require_once ("php_classes/BO/AudioFileBO.class.php");


if (isset($_POST['data']) && isset($_FILES['file'])) {
    try {
        
        $audioFileTO = AudioFile::getAudioFileTOFromJson($_POST['data']);
        
        if(isset($audioFileTO->deviceId)){
            
            $filePathWeb = doUploadNow($audioFileTO->deviceId);

            $audioFileTO->path = $filePathWeb;
            
            $audioFileBO = new AudioFileBO();

            $result = $audioFileBO->newAudioFile($audioFileTO);
            
            if ($result) {
                ok();
            }
            else{
                error("Unable to create new picture. ".$audioFileBO->lastErrorMessage);
            }
        }
        else{
            error("Missing device identifier.");
        }
    }
    catch (Exception $e) {
        error($e->getMessage());
    }
}
else{
    if (isset($_SERVER["CONTENT_LENGTH"])){
        if($_SERVER["CONTENT_LENGTH"]>((int)ini_get('post_max_size')*1024*1024)){
            error("File too big.");
            die();
        }
    }

    error("No file passed.");
}

