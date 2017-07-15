<?php
require_once('../php_func/constants.php');
require_once(ROOT_WEB . "/php_classes/bean/User.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Picture.class.php");
require_once(ROOT_WEB . "/php_classes/BO/PictureBO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/AudioFile.class.php");
require_once(ROOT_WEB . "/php_classes/BO/AudioFileBO.class.php");

//controllo che sia loggato
$userLogged = false;
@session_start();
if (isset($_SESSION['user'])) {
    $userTo = unserialize(@$_SESSION['user']);
    if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
        //loggato
        $userLogged = true;
        if (isset($_SESSION['idDevice']) || isset($_GET['idDevice'])) {
            if(isset($_SESSION['idDevice'])){
                $deviceId = $_SESSION['idDevice'];
            }
            else if (isset($_GET['idDevice'])){
                $deviceId = $_GET['idDevice'];
            }
            
            //qui prendo i file immagini usando le funzionalita' sottostanti 
            //e li preparo in una struttura dati che verra' visualizzata piu' giu'
            
            $deviceTO = new DeviceTO();
            $deviceTO->device_id = $deviceId;
            
            $pictureBO = new PictureBO();
            $picturesTOArray = $pictureBO->getPicturesOfDevice($deviceTO);
            
            $audioFileBO = new AudioFileBO();
            $audioFilesTOArray = $audioFileBO->getAudioFileOfDevice($deviceTO);
        }
    }
}
?>





<!DOCTYPE html>
<html>
<?php
    if ($userLogged) {
        //utente loggato
?>    

<?php
        if (isset($deviceId)) {
            //device id settato
?>
            <head>
                <title>File ricevuti dal dispositivo</title>
                <link rel="stylesheet" type="text/css" media="screen" 
                      href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css"/>
                <link href="css/pictureViewer.css" rel="stylesheet" type="text/css">
            </head>
            <body>
                
                <div class="gallery-wrapper">
                    <ul>
<?php
            if(isset($picturesTOArray)){
                foreach($picturesTOArray as $pictureTO){
?>                    
                        <li>
                            <figure class="img-wrapper fade">
                                <a class="fancybox" href="<?php echo $pictureTO->path ?>">
                                    <img width="100%" height="100%" src="<?php echo $pictureTO->path ?>">
                                    <h4></h4>
                                </a>
                            </figure>
                        </li>
<?php                    
                    
                }
            }
?>
                    </ul>
                </div>
                <div class="audioFile-wrapper">
                    <ul>
<?php
            if(isset($audioFilesTOArray)){
                $index = 0;
                foreach($audioFilesTOArray as $audioFileTO){
?>                    
                        <li>
                            <a href="<?php echo $audioFileTO->path ?>">
<?php 
                                echo AudioFileTO::$type . "". $index; 
                                $index++; 
?>
                            </a>
                        </li>
<?php                    
                }
            }
?>
                        
                    </ul>
                </div>
            </body>
            <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.min.js"></script>
<?php
        }
        else {
            //device id non settato
?>
            <head></head>
            <body>
                <div style="width:300px; margin:0 auto;">
                    Dispositivo non selezionato
                </div>
            </body>
<?php
        }
    }
    else {
        //utente non loggato
?>
        <head></head>
        <body>
            <div style="width:300px; margin:0 auto;">
                Utente non loggato
            </div>
        </body>

<?php
    }
?>


</html>