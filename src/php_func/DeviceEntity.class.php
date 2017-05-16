<?php

/**
 * Entita del dispositivo.
 * Ogni dispositivo e' collegato all'account del proprietario
*/
class DeviceEntity {
    public $device_id;
    public $deviceToken;

    function __construct($device_id, $deviceToken) {
        $this->device_id = $device_id;
        $this->deviceToken = $deviceToken;
    }
    
    function aMemberFunc() {
        print 'Inside `aMemberFunc()`';
    }

}


?>