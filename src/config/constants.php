<?php

//viene chiamata da qualsiasi parte, la current directory puo' essere diversa,
//quindi non funzioneranno i path relativi

//DOCUMENT_ROOT su altervista ritorna /var/www/html

define('_SERVER_DOCROOT_PATH_', 'C:/Apache24/htdocs');
//define('_SERVER_DOCROOT_PATH_', '/membri/pierprogramm');


require_once(_SERVER_DOCROOT_PATH_ . '/DTRC/qcodo/includes/prepend.inc.php');

define('ROOT_WEB', __DOCROOT__);

//cartella locale dove salvare i file ricevuti
define('FILES_FOLDER', __DOCROOT__ . "" . FILE_SEPARATOR_CHAR . "data");

//FILES_FOLDER accessibile dall'esterno
define('FILES_FOLDER_WEB', "http://" . $_SERVER['SERVER_NAME'] . "/DTRC/data");


//----- log
define('LOG_MODULE', ROOT_WEB . "/engine/log/Log.class.php");
define('LOG_PATH_FILE', ROOT_WEB . "/engine/log/Log.txt");


// ============== Codici di errore condivisi con il client ===========
define('DEVICE_EXISTS', "0");
define('USER_ALREADY_EXISTS', "1");
// ==============

//conferma indirizzo email utente appena registrato
define('EMAIL_CONFIRMATION_FUNCTION', $_SERVER['SERVER_NAME']."/DTRC/website/EmailConfirmation.php");
define('EMAIL_KEY_NAME', "key");

