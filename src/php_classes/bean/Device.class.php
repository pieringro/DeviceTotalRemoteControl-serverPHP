<?php


//device_id, device_tokenFirebase
class DeviceTO{
    //dati in input dal dispositivo
    public $device_id;
    public $device_tokenFirebase;

    public $emailUser;
    
    public function __toString(){
        return "DeviceTO : {"
                .$this->device_id.", "
                .$this->device_tokenFirebase.", "
                .$this->emailUser
                ."}";
    }
}


/**
 * Decodifica il json per ottenere i dati relativi all'entita' Device
*/
class Device {

    /**
     * Restituisce l'oggetto DeviceTO ottenuto dal parsing del json in input
    */
    public static function getDeviceTOFromJson($json) {
        $thisObj = new Device($json);
        return $thisObj->getDeviceTO();
    }
    
    /**
     * @param $json il json con i dati del Post
     */
    private function __construct($json) {
        $this->data = json_decode($json, TRUE);
        $this->deviceTO = new DeviceTO();
    }

    private $data;
    private $deviceTO;

    function getDeviceTO() {
        $result = $this->parsingJson($message);
        if ($result) {
            return $this->deviceTO;
        } else {
            throw new Exception("Error parsing json. Message=".$message);
        }
    }

    private function parsingJson(&$message) {
        $device_id = $this->data['device_id'];
        $device_tokenFirebase = $this->data['device_tokenFirebase'];
        if (!(isset($device_id) && isset($device_tokenFirebase))) {
            $message = "Some required parameters are missing.";
            return false;
        }
        else {
            $this->deviceTO->device_id = $device_id;
            $this->deviceTO->device_tokenFirebase = $device_tokenFirebase;
            
            if(isset($this->data['emailUser'])){
                $this->deviceTO->emailUser = $this->data['emailUser'];
            }
            
            return true;
        }
    }

}




?>