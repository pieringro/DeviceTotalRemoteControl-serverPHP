<?php

abstract class FirebaseCommandsKey {
    const PLAY_BEEP = "PLAY_BEEP";
    const TAKE_PICTURE = "TAKE_PICTURE";

    //altre key dei comandi...
}



 

class Firebase {
    
    function __construct() {
        
    }
    
    const URL = "https://fcm.googleapis.com/fcm/send";
    const KEY_AUTH = "AAAAgI9yyrY:APA91bHRL4YdMkXHserXEOBpQ0NMcxa09wgof3jd-mXoOVHWrd_Y0vvYoNYSPEHUzJHs6n1-FcxFiiUqz0wCspglnamexkO86pzC9r5i6QhGnu8_FWMp1OCF_zmzJHI_8VplMSVBcwas";
    
    public $lastErrorMessage;
    
    public function send($registration_ids, $dataParams){
        $fields = array(
            'registration_ids' => array($registration_ids),
            'data' => $dataParams,
        );
        return $this->postJsonFirebaseRest($fields);
    }

    private function postJsonFirebaseRest($fields) {
        $headers = array
            (
            'Authorization: key=' . self::KEY_AUTH,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);

        if ($result == false) {
            $this->lastErrorMessage = "Firebase server response error.";
        }
        return $result;
    }
}



//  ################ TEST

//$dataParams = array(
//    "CommandId" => FirebaseCommandsKey::TAKE_PICTURE,
//    "FrontPic" => "3",
//    "BackPic" => "1"
//);

/*
$dataParams = array(
    "CommandId" => FirebaseCommandsKey::PLAY_BEEP
);

$toTokenFirebase = "dlBq6UJXIbU:APA91bEQpsSZPuS-dsUUSjxTzvXhmNJq4rpK3PHajMAts0QxkgufPdUo43tch8ed3IWDlf_Tx1_h8ngaY5P6QJdouzna6rewJBODYkECEq2Ca8siamx2tyTQwoifxXnm_OMIDOvEksoU";


$firebaseObj = new Firebase();
$result = $firebaseObj->send($toTokenFirebase, $dataParams);

var_dump($result);
*/

//  ###############




?>