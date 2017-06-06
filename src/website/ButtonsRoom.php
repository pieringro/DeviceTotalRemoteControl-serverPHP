<?php
require_once('../php_func/constants.php');
require_once('../php_func/simple_html_dom.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");

//controllo che sia loggato
session_start();
if(isset($_SESSION['user'])){
    $to = unserialize(@$_SESSION['user']);
}

if(isset($to) && $to != false && $to instanceof UserTO){
    //loggato, carica il file html
    
}
$htmlString = file_get_contents('ButtonsRoom.htm');
$htmlString = str_replace("@dato@", "Dato sostituito con una stringa da codice php!!!", $htmlString);
    
echo $htmlString;



//$html = str_get_html($htmlString);
//echo $html;


?>