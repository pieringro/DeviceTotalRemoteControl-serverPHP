<?php

    define('ROOT', "C:\\Apache24\\htdocs");
    
    //cartella locale dove salvare i file ricevuti
    define('FILES_FOLDER', ROOT . "\\data");
    
    //FILES_FOLDER accessibile dall'esterno
    define('FILES_FOLDER_WEB', 
            "http://".$_SERVER['SERVER_NAME']."/data")
    

    
?>