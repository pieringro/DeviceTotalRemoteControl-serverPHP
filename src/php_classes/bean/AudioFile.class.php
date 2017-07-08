<?php
require_once("File.class.php");

class AudioFileTO extends FileTO{
    public static $type = "AudioFile";
    
    public function __toString() {
        return "AudioFileTO : {"
                . $this->path.','
                . $this->deviceId.''
                . "}";
    }
}


class AudioFile extends File{
    
    /**
     * Restituisce l'oggetto PictureTO ottenuto dal parsing del json in input
     */
    public static function getAudioFileTOFromJson($json) {
        $thisObj = new AudioFile($json);
        return $thisObj->getAudioFileTO();
    }
    
    protected function __construct($json) {
        parent::__construct($json);
        $this->fileTO = new AudioFileTO();
    }
    

    function getAudioFileTO() {
        return parent::getFileTO();
    }
    
    protected function parsingJson(&$message) {
        return parent::parsingJson($message);
    }
    
}
