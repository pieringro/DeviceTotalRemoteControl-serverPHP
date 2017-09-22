<?php

require_once(LOG_MODULE);

class FileTO {
    public $path;
    public $deviceId;
    public $dateCreated;
    public function __toString() {
        return "FileTO : {"
                . $this->path.','
                . $this->deviceId.''
                . $this->dateCreated.''
                . "}";
    }
}


class File {
    

    /**
     * @param $json il json con i dati del File
     */
    protected function __construct($json) {
        $this->data = json_decode($json, TRUE);
    }

    protected $data;
    protected $fileTO;

    function getFileTO() {
        $message = "";
        $result = $this->parsingJson($message);
        if ($result) {
            return $this->fileTO;
        } else {
            $msg = "Error parsing json. Message=" . $message;
            error($msg);
            $log->lwrite($msg);
            throw new Exception($msg);
        }
    }

    protected function parsingJson(&$message) {
        if (isset($this->data['device_id'])) {
            $deviceId = $this->data['device_id'];
        }
        
        if (!(isset($deviceId))) {
            $message = "Some required parameters are missing.";
            return false;
        } else {
            $this->fileTO->deviceId = $deviceId;
            return true;
        }
    }
}
