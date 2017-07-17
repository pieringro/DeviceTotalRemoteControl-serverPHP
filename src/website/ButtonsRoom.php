<?php
require_once('../php_func/constants.php');
require_once(ROOT_WEB . "/php_func/simple_html_dom.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(ROOT_WEB . "/php_classes/BO/DeviceBO.class.php");

$userLogged = false;
//controllo che sia loggato
@session_start();
if (isset($_SESSION['user'])) {
    $userTo = unserialize(@$_SESSION['user']);

    if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
        //loggato
        $userLogged = true;

        if (isset($_POST['idDevice']) || isset($_SESSION['idDevice'])) {
            if(isset($_POST['idDevice'])){
                $deviceId = $_POST['idDevice'];
                $_SESSION['idDevice'] = $deviceId;
            }
            else if(isset($_SESSION['idDevice'])){
                $deviceId = $_SESSION['idDevice'];
            }
            
            $deviceBO = new DeviceBO();
            $deviceTO = new DeviceTO();
            $deviceTO->device_id = $deviceId;
            $deviceToken = $deviceBO->getTokenOfThisDevice($deviceTO);
        } else {
            
        }
    }
}


include('templates/ButtonsRoomTPL.php')

?>