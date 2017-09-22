<?php

require_once(ROOT_WEB . "/php_classes/bean/AudioFile.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(__INCLUDES__ . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");
require (LOG_MODULE);

class AudioFileBO {
    private $log;

    public function __construct() {
        $this->log = Log::getInstance();
    }

    public $lastErrorMessage;

    public function newAudioFile($audioFileTO) {
        if (($audioFileTO instanceof AudioFileTO)) {
            $qcodoEntity = new DtrcFiles();
            $qcodoEntity->InitDataWithAudioFileTO($audioFileTO);
            try {
                $qcodoEntity->Save();
                return true;
            } catch (Exception $e) {
                $msg = "Exception while saving new audio file.";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - Exception: ".$e->getMessage()." , ".$e->getTraceAsString());
                return false;
            }
        }
    }
    
    public function getAudioFileOfDevice($deviceTO) {
        if ($deviceTO instanceof DeviceTO) {
            $device_id = $deviceTO->device_id;
        } else if (is_string($deviceTO)) {
            $device_id = $deviceTO;
        }

        if (isset($device_id)) {
            $audioFileTOsArray = DtrcFiles::LoadByIdDeviceInArrayAudioFileTO($device_id);
            return $audioFileTOsArray;
        }
        return false;
    }

    
    
    public function __destruct() {
        $this->log->lclose();
    }
    
}

