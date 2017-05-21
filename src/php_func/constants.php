<?php

    define('ROOT', "C:\\Apache24\\htdocs");
    
    define('ROOT_WEB', $_SERVER['DOCUMENT_ROOT'].'/DTRC_src');
    
    //cartella locale dove salvare i file ricevuti
    define('FILES_FOLDER', ROOT . "\\data");
    
    //FILES_FOLDER accessibile dall'esterno
    define('FILES_FOLDER_WEB', 
            "http://".$_SERVER['SERVER_NAME']."/data")
    

    
?>