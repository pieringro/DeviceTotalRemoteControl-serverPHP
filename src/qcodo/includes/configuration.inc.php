<?php

// This is the "recommended" version of configuration.inc.php, without any comments, and restructured in a way
// that should make sense for most pro-users of Qcodo.
// While it is recommended (for ease of code readability) to use this version of configuration.inc.php-dist,
// the configuration.inc.php-full version could potentially be more useful for newer users of Qcodo as it has
// comments inline within the file.
// To use, simply rename or copy this file to includes/configuration.inc.php, and begin making modifications
// to the configuration constants as it makes sense for your PHP and docroot installation.

//mi assicuro che non venga eseguito piu' volte
if (!defined('SERVER_INSTANCE')) {

    define('SERVER_INSTANCE', 'dev');

    switch (SERVER_INSTANCE) {
        case 'dev':
            define('__DOCROOT__', 'C:/Apache24/htdocs/DTRC');
            define('__VIRTUAL_DIRECTORY__', '');
            define('__SUBDIRECTORY__', '/qcodo/www');
            define('FILE_SEPARATOR_CHAR', '\\');

            define('DB_CONNECTION_1', serialize(array(
                'adapter' => 'MySqli5',
                'server' => 'localhost',
                'port' => 3320,
                'database' => 'DTRC',
                'username' => 'root',
                'password' => 'slipknot-123',
                'profiling' => true)));
            
            define('_ERROR_DEBUG_CODE_', false);
            break;
        
        case 'test':
            break;

        case 'stage':
            break;

        case 'prod':
            define('__DOCROOT__', '/membri/pierprogramm/DTRC');
            define('__VIRTUAL_DIRECTORY__', '');
            define('__SUBDIRECTORY__', '/qcodo/www');
            define('FILE_SEPARATOR_CHAR', '/');

            define('DB_CONNECTION_1', serialize(array(
                'adapter' => 'MySqli5',
                'server' => 'localhost',
                'port' => 3320,
                'database' => 'my_pierprogramm',
                'username' => 'pierprogramm',
                'password' => '',
                'profiling' => false)));
            
            define('_ERROR_DEBUG_CODE_', false);
            break;
    }

    define('ALLOW_REMOTE_ADMIN', false);
    define('__URL_REWRITE__', 'none');

    define('__DEVTOOLS_CLI__', __DOCROOT__ . __SUBDIRECTORY__ . '/../cli');
    define('__INCLUDES__', __DOCROOT__ . __SUBDIRECTORY__ . '/../includes');
    define('__QCODO__', __INCLUDES__ . '/qcodo');
    define('__QCODO_CORE__', __INCLUDES__ . '/qcodo/_core');
    define('__DATA_CLASSES__', __INCLUDES__ . '/data_classes');
    define('__DATAGEN_CLASSES__', __INCLUDES__ . '/data_classes/generated');
    define('__DATA_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls');
    define('__DATAGEN_META_CONTROLS__', __INCLUDES__ . '/data_meta_controls/generated');

    define('__ERROR_LOG__', __DOCROOT__ . '/engine/log/error_log');
    define('__QCODO_LOG__', __DOCROOT__ . '/engine/log/qcodolog');
    define('__TEST_CASES__', __DOCROOT__ . '/../tests');

    define('__FORM_DRAFTS__', __SUBDIRECTORY__ . '/drafts');
    define('__PANEL_DRAFTS__', __SUBDIRECTORY__ . '/drafts/dashboard');

// Examples and Devtools are deprecated as of 0.4.0, but these constants are still here to
// support any QPM packages that may still want to use them
    define('__DEVTOOLS__', null);
    define('__EXAMPLES__', null);

    define('__JS_ASSETS__', __SUBDIRECTORY__ . '/assets/js');
    define('__CSS_ASSETS__', __SUBDIRECTORY__ . '/assets/css');
    define('__IMAGE_ASSETS__', __SUBDIRECTORY__ . '/assets/images');
    define('__PHP_ASSETS__', __SUBDIRECTORY__ . '/assets/php');

    if (!ini_get('date.timezone'))
        date_default_timezone_set('America/Los_Angeles');

    define('ERROR_LOG_FLAG', true);
//	define('ERROR_FRIENDLY_PAGE_PATH', '/absolute/path/to/friendly_error_page.html');
//	define('ERROR_FRIENDLY_AJAX_MESSAGE', 'Oops!  An error has occurred.\r\n\r\nThe error was logged, and we will take a look into this right away.');

    define('QCODO_LOG_LEVEL', 6);
    
}
?>