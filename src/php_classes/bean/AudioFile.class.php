<?php
require_once("File.class.php");

class AudioFileTO extends FileTO{
    public static $type = "AudioFile";
    
    public $length;
    
    public function __toString() {
        return "AudioFileTO : {"
                .'Path: '. $this->path.', '
                .'DeviceId: '. $this->deviceId.', '
                .'DateCreated: '. $this->dateCreated.', '
                .'Length: '. $this->length.''
                . "}";
    }
}


class AudioFile extends File{
    
    /**
     * Restituisce l'oggetto AudioFileTO ottenuto dal parsing del json in input
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
        $result = parent::parsingJson($message);
        if($result){
            if (isset($this->data['length'])) {
                $length = $this->data['length'];
                $this->fileTO->length = $length;
            }
        }
        
        return $result;
    }
    
}
