<?php

require_once("AbstractDAO.class.php");

//device_id, device_tokenFirebase
class DeviceTO{
    //dati in input dal dispositivo
    public $device_id;
    public $device_tokenFirebase;

    public $userId;
}


/**
 * Decodifica il json per ottenere i dati relativi all'entita' Device
*/
class Device {

    /**
     * Restituisce l'oggetto DeviceTO ottenuto dal parsing del json in input
    */
    public static function getDeviceTOFromJson($json) {
        $thisObj = new DeviceTO($json);
        return $thisObj->getDeviceTO();
    }

    private $data;
    private $deviceTO;

    function getDeviceTO() {
        if ($this->parsingJson()) {
            return $this->deviceTO;
        } else {
            throw new Exception("Error parsing json.");
        }
    }

    private function parsingJson() {
        $device_id = $this->data['device_id'];
        $device_tokenFirebase = $this->data['device_tokenFirebase'];
        if (!(isset($device_id) && isset($device_tokenFirebase))) {
            return false;
        }
        else {
            $this->deviceTO->device_id = $device_id;
            $this->deviceTO->device_tokenFirebase = $device_tokenFirebase;
            return true;
        }
    }

}




?>