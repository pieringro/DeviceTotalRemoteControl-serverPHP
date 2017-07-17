<?php
//caricamento variabili template
if (isset($inputTPL) && is_array($inputTPL)) {
    if (isset($inputTPL['userLogged'])) {
        $userLogged = $inputTPL['userLogged'];
    }

    if (isset($inputTPL['userTo'])) {
        $userTo = $inputTPL['userTo'];
    }

    if (isset($inputTPL['deviceId'])) {
        $deviceId = $inputTPL['deviceId'];
    }
    
    if(isset($inputTPL['picturesToArray'])){
        $picturesToArray = $inputTPL['picturesToArray'];
    }
    
    if(isset($inputTPL['audioFilesTOArray'])){
        $audioFilesTOArray = $inputTPL['audioFilesTOArray'];
    }
}
?>



<!DOCTYPE html>
<html>
<?php
    if ($userLogged) {
        //utente loggato
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
            if(isset($picturesToArray)){
                foreach($picturesToArray as $pictureTO){
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