<?php

require_once ("php_func/constants.php");
require_once ("php_func/clientComunication.php");
require_once ("php_func/receiveFileUploaded.php");
require_once ("php_classes/bean/AudioFile.class.php");
require_once ("php_classes/BO/AudioFileBO.class.php");
require_once (LOG_MODULE);

require_once("./checkAPIKey.php");

if(isset($_POST['apikey']) && !CheckAPIKey($_POST['apikey'])){
    error("API KEY NOT VALID.");
    die();
}

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
                $msg = "Unable to create new audio file. ".$audioFileBO->lastErrorMessage;
                error($msg);
                $log->lwrite($msg);
            }
        }
        else{
            $msg = "Missing device identifier.";
            error($msg);
            $log->lwrite($msg);
        }
    }
    catch (Exception $e) {
        error($e->getMessage());
        $log->lwrite($e->getMessage());
    }
}
else{
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
