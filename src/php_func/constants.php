<?php

    define('ROOT', "C:\\Apache24\\htdocs");
    
    define('ROOT_WEB', $_SERVER['DOCUMENT_ROOT'].'/DTRC');
    
    //cartella locale dove salvare i file ricevuti
    define('FILES_FOLDER', ROOT . "\\data");
    
    //FILES_FOLDER accessibile dall'esterno
    define('FILES_FOLDER_WEB', 
            "http://".$_SERVER['SERVER_NAME']."/data");
    
    
    define('QCODO_INCLUDE_FOLDER', ROOT_WEB . "/qcodo/includes");
    
    //----- log
    define('LOG_MODULE', ROOT_WEB."/engine/log/Log.class.php");
    define('LOG_PATH_FILE', ROOT_WEB."/engine/log/Log.txt");
    
    
    //---- Codici di errore condivisi con il client
    define('DEVICE_EXISTS', "0");
    
?>