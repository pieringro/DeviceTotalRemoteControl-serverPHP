<?php

require_once(__DATA_CLASSES__ . "/DtrcResources.class.php");
require_once(__DATA_CLASSES__ . "/DtrcUsers.class.php");


if (!class_exists("ResourcesManager")) {

    /**
     * Gestore delle risorse, configurato in modo che estragga la risorsa nella
     * lingua voluta.
     * @author Pierluigi Ingrosso p.ingrosso9@gmail.com
     */
    class ResourcesManager {

        public static $lang;
        
        
        public static function getResource($id){
            try{
                $resource = DtrcResources::LoadById($id);
                if($resource == null){
                    return $id;
                }
                
                switch(ResourcesManager::$lang){
                    case ResourcesLanguages::ENGLISH:
                        return $resource->TextEnglish;
                    case ResourcesLanguages::ITALIAN:
                        return $resource->TextItalian;
                    default:
                        return $resource->TextEnglish;
                }
            } catch (Exception $e){
                return "";
            }
        }
    }
    
    abstract class ResourcesLanguages{
        const ENGLISH = "English";
        const ITALIAN = "Italian";
    }
    
    
    
    //configurazione della lingua a seconda dell'utente loggato
    @session_start();
    if (isset($_SESSION['user'])) {
        $userTo = unserialize(@$_SESSION['user']);
        if (isset($userTo) && $userTo != false && $userTo instanceof UserTO) {
            $dtrcUser = DtrcUsers::LoadByEmail($userTo->email);
            ResourcesManager::$lang = $dtrcUser->Lang;
        }
    }
    else{
        $lang = ResourcesLanguages::ENGLISH;
    }
    
    
    
}