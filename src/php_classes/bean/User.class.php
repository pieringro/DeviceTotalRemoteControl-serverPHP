<?php

class UserTO {

    public $email;
    public $pass;

    public function __toString() {
        return "UserTO : {"
                . $this->email . ", "
                . $this->pass
                . "}";
    }

}

/**
 * Decodifica il json per ottenere i dati relativi all'entita' User
 */
class User {

    /**
     * Restituisce l'oggetto UserTO ottenuto dal parsing del json in input
     */
    public static function getUserTOFromJson($json) {
        $thisObj = new User($json);
        return $thisObj->getUserTO();
    }

    /**
     * @param $json il json con i dati del Post
     */
    private function __construct($json) {
        $this->data = json_decode($json, TRUE);
        $this->userTO = new UserTO();
    }

    private $data;
    private $userTO;

    function getUserTO() {
        $result = $this->parsingJson($message);
        if ($result) {
            return $this->userTO;
        } else {
            throw new Exception("Error parsing json. Message=" . $message);
        }
    }

    private function parsingJson(&$message) {
        if(isset($this->data['email']) && isset($this->data['pass'])){
            $email = $this->data['email'];
            $pass = $this->data['pass'];
        }
        
        if (!(isset($email) && isset($pass))) {
            $message = "Some required parameters are missing.";
            return false;
        } else {
            $this->userTO->email = $email;
            $this->userTO->pass = $pass;
            return true;
        }
    }

}

?>