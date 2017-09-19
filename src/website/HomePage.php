<?php
require_once('../config/constants.php');
require_once(ROOT_WEB . "/php_func/simple_html_dom.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(ROOT_WEB . "/php_classes/BO/DeviceBO.class.php");
require_once(ROOT_WEB . "/engine/resources/ResourcesManager.class.php");

$inputTPL = array();

$userLogged = false;
//controllo che sia loggato
@session_start();
if (isset($_SESSION['user'])) {
    $userTo = unserialize(@$_SESSION['user']);
    if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
        //loggato
        $userLogged = true;
        $inputTPL['userLogged'] = $userLogged;
        $inputTPL['userTo'] = $userTo;
        
        if (isset($_POST['idDevice']) || isset($_SESSION['idDevice'])) {
            if(isset($_POST['idDevice'])){
                $deviceId = $_POST['idDevice'];
                $_SESSION['idDevice'] = $deviceId;
            }
            else if(isset($_SESSION['idDevice'])){
                $deviceId = $_SESSION['idDevice'];
            }
            
            $inputTPL['deviceId'] = $deviceId;
            $deviceBO = new DeviceBO();
            $deviceTO = new DeviceTO();
            $deviceTO->device_id = $deviceId;
            $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
            if(isset($deviceToken)){
                $inputTPL['deviceToken'] = $deviceToken;
            }
        } else {
            $userBO = new UserBO();
            $devicesTOList = $userBO->getDevicesToFromUser($userTo);
            $devicesIdsStringForHtml = "";
            foreach ($devicesTOList as $deviceTO) {
                if ($deviceTO instanceof DeviceTO) {
                    $devicesIdsStringForHtml .= "<option>" . $deviceTO->device_id . "</option> ";
                }
            }
            $inputTPL['devicesIdsStringForHtml'] = $devicesIdsStringForHtml;
        }
        
    }
}


include('templates/HomePageTPL.php');


