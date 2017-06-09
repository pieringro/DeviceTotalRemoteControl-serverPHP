<?php
require_once('../php_func/constants.php');
require_once('../php_func/simple_html_dom.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/BO/UserBO.class.php");

//controllo che sia loggato
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['idDevicesList'])){
    $userTo = unserialize(@$_SESSION['user']);
    //inserira in session anche una variabile che identifica i diversi token dei dispositivi di quest'utente
    $deviceToken = "Valore preso dalla sessione";
    
    $userBo = new UserBO();
    $devicesTOList = $userBo->getDevicesToFromUser($userTo);
    $devicesIdsStringForHtml = "";
    foreach($devicesTO as $devicesTOList){
        $devicesIdsStringForHtml .= "<option>".$devicesTO->Id."</option>";
    }
    
    if(isset($userTo) && $userTo != false && $userTo instanceof UserTO){
        //loggato, carica il file html
        
    }
    $htmlString = file_get_contents('ButtonsRoom.htm');
    $htmlString = str_replace("@dato@", "Dato sostituito con una stringa da codice php!!!", $htmlString);
    $htmlString = str_replace("@deviceToken@", $devicesIdsStringForHtml, $htmlString);

    echo $htmlString;
}




?>