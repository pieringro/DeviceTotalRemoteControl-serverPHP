<?php

require_once("AbstractDAO.class.php");


class DeviceTO{

}


/**
 * Decodifica il json per ottenere i dati relativi all'entita' Device
*/
class Device {


    /**
     * Restituisce l'oggetto PostTO ottenuto dal parsing del json in input
    */
    public static function getPostTOFromJson($json) {
        $thisObj = new DeviceTO($json);
        return $thisObj->getPostTO();
    }



    private $data;
    private $postTO;

    function getDeviceTO() {
        if ($this->parsingJson()) {
            return $this->postTO;
        } else {
            throw new Exception("Error parsing json.");
        }
    }

    private function parsingJson() {
        $lat = $this->data['lat'];
        $lng = $this->data['lng'];
        $accuracy = $this->data['accuracy'];
        $title = $this->data['title'];
        $description = $this->data['description'];
        $timestamp = $this->data['timestamp'];
        if (!(isset($lat) && isset($lng) && isset($accuracy) &&
                isset($title) && isset($description) && isset($timestamp))) {

            return false;
        } else {
            $this->postTO->setLatitude($lat);
            $this->postTO->setLongitude($lng);
            $this->postTO->setAccuracy($accuracy);
            $this->postTO->setTitle($title);
            $this->postTO->setDescription($description);
            $this->postTO->setTimestamp($timestamp);
            return true;
        }
    }


}




?>