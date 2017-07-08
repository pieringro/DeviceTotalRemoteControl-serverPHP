<?php

require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/AudioFile.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(QCODO_INCLUDE_FOLDER . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");

class AudioFileBO {

    public function __construct() {
        
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
                //salvo il message dell'exception nel log
                $this->lastErrorMessage = "Exception while saving new user.";
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

}

