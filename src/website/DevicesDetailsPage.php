<?php

require_once('../php_func/constants.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Picture.class.php");
require_once(ROOT_WEB . "/php_classes/BO/PictureBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/AudioFile.class.php");
require_once(ROOT_WEB . "/php_classes/BO/AudioFileBO.class.php");

$inputTPL = array();
$userLogged = false;
@session_start();
if (isset($_SESSION['user'])) {
    $userTo = unserialize(@$_SESSION['user']);
    if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
        //loggato
        $userLogged = true;
        $inputTPL['userLogged'] = $userLogged;
        if (isset($_GET['idDevice'])) {
            $deviceId = $_GET['idDevice'];
            $inputTPL['deviceId'] = $deviceId;

            $deviceTO = new DeviceTO();
            $deviceTO->device_id = $deviceId;
            
            $pictureBO = new PictureBO();
            $picturesToArray = $pictureBO->getPicturesOfDevice($deviceTO);
            $inputTPL['picturesToArray'] = $picturesToArray;
            
            $audioFileBO = new AudioFileBO();
            $audioFilesTOArray = $audioFileBO->getAudioFileOfDevice($deviceTO);
            $inputTPL['audioFilesTOArray'] = $audioFilesTOArray;
        }
    }
}


include('templates/DeviceDetailsPageTPL.php');
