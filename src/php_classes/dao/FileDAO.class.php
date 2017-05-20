<?php

require_once("AbstractDAO.class.php");


class FileDAO extends AbstractDAO{

    private $table;
    private $fullFields;
    private $selectFields;
    private $fakeValues;

    function __construct(){
        $this->table = "";
        $this->fullFields = "IDDevice, Path";
        $this->selectFields = "IDDevice, Path";
        $this->fakeValues = "?, ?";
    }

        
    /**
     * Crea un nuovo record della tabella con i dati passati attraverso il to.
     *
     * @throws Exception se si verifica qualche errore nel dialogo con il db
    */
    public function create($to){
        
    }



}



?>