<?php

require_once("File.class.php");

class PictureTO extends FileTO{
    public static $type = "Picture";

    public function __toString() {
        return "PictureTO : {"
                . $this->path.','
                . $this->deviceId.''
                . "}";
    }

}


class Picture extends File {
    
    /**
     * Restituisce l'oggetto PictureTO ottenuto dal parsing del json in input
     */
    public static function getPictureTOFromJson($json) {
        $thisObj = new Picture($json);
        return $thisObj->getPictureTO();
    }
    
    protected function __construct($json) {
        parent::__construct($json);
        $this->fileTO = new PictureTO();
    }
    

    function getPictureTO() {
        return parent::getFileTO();
    }
    
    protected function parsingJson(&$message) {
        return parent::parsingJson($message);
    }

}
