<?php


require_once('../php_func/constants.php');
require_once(ROOT_WEB . "/php_func/simple_html_dom.php");
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(ROOT_WEB . "/php_classes/BO/DeviceBO.class.php");

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
        
        //ottengo la lista dei dispositivi
        $userBO = new UserBO();
        $devicesTOList = $userBO->getDevicesToFromUser($userTo);
        
        //$devicesIdsStringForHtml = "";
        //foreach ($devicesTOList as $deviceTO) {
        //    if ($deviceTO instanceof DeviceTO) {
        //        $devicesIdsStringForHtml .= "<option>" . $deviceTO->device_id . "</option> ";
        //    }
        //}
        
        $inputTPL['devicesTosList'] = $devicesTOList;
        
    }
}


include('templates/DevicesListPageTPL.php');
