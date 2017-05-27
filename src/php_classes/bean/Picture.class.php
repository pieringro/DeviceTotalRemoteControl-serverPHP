<?php


class PictureTO {

    public $path;
    public $deviceId;

    public function __toString() {
        return "PictureTO : {"
                . $this->path.','
                . $this->deviceId.''
                . "}";
    }

}


class Picture {
    
    /**
     * Restituisce l'oggetto UserTO ottenuto dal parsing del json in input
     */
    public static function getPictureTOFromJson($json) {
        $thisObj = new Picture($json);
        return $thisObj->getPictureTO();
    }

    /**
     * @param $json il json con i dati del Post
     */
    private function __construct($json) {
        $this->data = json_decode($json, TRUE);
        $this->pictureTO = new PictureTO();
    }

    private $data;
    private $pictureTO;

    function getPictureTO() {
        $result = $this->parsingJson($message);
        if ($result) {
            return $this->pictureTO;
        } else {
            throw new Exception("Error parsing json. Message=" . $message);
        }
    }

    private function parsingJson(&$message) {
        $deviceId = $this->data['device_id'];
        
        if (!(isset($deviceId))) {
            $message = "Some required parameters are missing.";
            return false;
        } else {
            $this->pictureTO->deviceId = $deviceId;
            return true;
        }
    }
}
