<?php
require_once(ROOT_WEB . "/php_classes/bean/Device.class.php");
require_once(__INCLUDES__ . "/prepend.inc.php");
require_once("UserBO.class.php");
require_once(__DATA_CLASSES__ . "/DtrcPendingEmailUserConfirmation.class.php");
require_once(LOG_MODULE);

class PendingEmailBO {
    
    
    public function __construct() {
        $this->log = Log::getInstance();
        $this->userBO = new UserBO();
    }
    private $userBO;
    private $log;

    public $lastErrorMessage;
    
    
    
    /**
     * Prova a trovare una corrispondenza della stringa criptata, tra le 
     * conferme email pendenti. Se la trova, allora elimina il record di email
     * pendente e attiva l'utente.
     */
    public function decrypt($cryptedString){
        $result = false;
        
        $pendingEmailUserConfMatched = null;
        $allPendingEmailUserConf = DtrcPendingEmailUserConfirmation::LoadAll();
        foreach($allPendingEmailUserConf as $aPendingEmailUserConf){
            $uuidRecord = $aPendingEmailUserConf->Id;
            $emailUserRecord = $aPendingEmailUserConf->EmailUser;
            $cryptedStringRecord = crypt($emailUserRecord, $uuidRecord);
            if($cryptedString === $cryptedStringRecord){
                $result = true;
                $pendingEmailUserConfMatched = $aPendingEmailUserConf;
                break;
            }
        }
        
        //elimino il record corrispondente se e' stato trovato e aggiorno l'utente con Inactive
        if($result && isset($pendingEmailUserConfMatched)){
            $result = $this->userBO->activeUser($pendingEmailUserConfMatched->EmailUser);
            if($result){
                $pendingEmailUserConfMatched->Delete();
            }
        }
        
        return $result;
    }
    
    
        
}
