<?php

require_once(__DATA_CLASSES__ . "/DtrcResources.class.php");

if (!class_exists("ResourcesManager")) {

    /**
     * Gestore delle risorse, configurato in modo che estragga la risorsa nella
     * lingua voluta.
     * @author Pierluigi Ingrosso p.ingrosso9@gmail.com
     */
    class ResourcesManager {
        
        private static $instance;
        public static function getInstance(){
            if(ResourcesManager::$instance == null){
                ResourcesManager::$instance = new ResourcesManager();
            }
            return ResourcesManager::$instance;
        }
        private function __construct() {
            
        }
        
        const lang = ResourcesLanguages::ITALIAN;
        
        
        public static function getResource($id){
            try{
                $resource = DtrcResources::LoadById($id);
                if($resource == null){
                    return $id;
                }
                
                switch(ResourcesManager::lang){
                    case ResourcesLanguages::ENGLISH:
                        return $resource->TextEnglish;
                    case ResourcesLanguages::ITALIAN:
                        return $resource->TextItalian;
                }
            } catch (Exception $e){
                return "";
            }
        }
        
    }
    
    abstract class ResourcesLanguages{
        const ENGLISH = 0;
        const ITALIAN = 1;
    }
    
}