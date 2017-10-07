<?php

require_once(ROOT_WEB . "/php_classes/bean/Picture.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(__INCLUDES__ . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcFiles.class.php");
require_once(LOG_MODULE);

class PictureBO {

    public function __construct() {
        $this->log = Log::getInstance();
    }
    private $log;

    public $lastErrorMessage;

    public function newPicture($pictureTO) {
        if (($pictureTO instanceof PictureTO)) {
            $qcodoEntity = new DtrcFiles();
            $qcodoEntity->InitDataWithPictureTO($pictureTO);

            try {
                $qcodoEntity->Save();
                return true;
            } catch (Exception $e) {
                //salvo il message dell'exception nel log
                $msg = "Exception while saving new picture file. ";
                $this->lastErrorMessage = $msg;
                $this->log->lwrite("$msg - Exception: ".$e->getMessage()." , ".
                        $e->getTraceAsString()." Picture: $pictureTO");
                return false;
            }
        }
    }
    
    
    public function getPicturesOfDevice($deviceTO) {
        if ($deviceTO instanceof DeviceTO) {
            $device_id = $deviceTO->device_id;
        } else if (is_string($deviceTO)) {
            $device_id = $deviceTO;
        }

        if (isset($device_id)) {
            $pictureTOsArray = DtrcFiles::LoadByIdDeviceInArrayPictureTO($device_id);
            return $pictureTOsArray;
        }
        return false;
    }

    
    public function __destruct() {
        $this->log->lclose();
    }
}
