<?php
require_once(ROOT_WEB . "/php_classes/dao/AbstractDAO.class.php");
require_once(ROOT_WEB . "/php_classes/bean/Picture.class.php");
require_once(QCODO_INCLUDE_FOLDER . "/prepend.inc.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");


class PictureBO {
    
    
    public function __construct() {
        
    }


    public $lastErrorMessage;
    
    public function newPicture($pictureTO){
        if(($pictureTO instanceof PictureTO)){
            
            
        }
    }
    
}
