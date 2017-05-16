<?php

require_once("ConnectToDB.class.php");


/**
 * Questa classe è la root della gerarchia del package DAO. 
 * Ogni classe DAO estende questa classe che fornisce metodi necessari a tutte le DAO.
 * Ogni classe DAO da per scontato che il to ricevuto sia quello corretto, il controllo
 * è delegato ai livelli superiori (BO).
 * Implementa il pattern Factory, i clients si rivolgono ad essa per ottenere
 * un istanza della DAO voluta. Assicura quindi il non accoppiamento tra le DAO
 * e le BO.
*/
abstract class AbstractDAO{
    
    /**Matrice che associa ad un nome (es. Owner) le classi DAO corrispondenti*/
    private static $matrix;
    
    
    
    /**Inizializza nella matrice le corrispondenze nome -> classe dao*/
    private static function initMatrix(){
        AbstractDAO::$matrix = array(
                              "device" => new DeviceEntity()
        );
    }
    
    
    
    /**
     * Questa funzione cerca nella matrice $matrix la dao associata alla stringa
     * in input e restituisce un istanza di quella dao.
     *
    */
    public static function getIstanceDAO($string){
        AbstractDAO::initMatrix();
        
        return AbstractDAO::$matrix[$string];
    }
    
    
    
    
    public abstract function create($to);
    
    /**
     * Lettura. Le informazioni nel to in input vengono utilizzati per trovare
     * le corrispondenze nella tabella
    */
    public abstract function read($to);
    
    public abstract function update($oldTO, $newTO);
    
    public abstract function delete($to);
    
    
    
    /**Oggetto della classe ConnectToDB, usato per la connessione
     * e nella preparazione dello statement nelle classi che ereditano*/
    private $db;
    
    
    
    /**
     * Connessione al database.
     * @return true se la connessione ha successo, false altrimenti
    */
    protected final function connect(){
        $this->db = new ConnectToDB();
        return $this->db->connect();
    }
    
    
    
    
    /**
     * Prepara lo statement prendendo in input il tipo di query, la tabella e i valori
     * nel formato con i ? invece dei valori. Esempi
     * INSERT INTO table(campo1, campo2, campo3) VALUES (?, ?, ?)
     * UPDATE Persone SET campo1 = ?, campo2 = ? WHERE campo3 = ?
     * L'utente della funzione deve manipolare direttamente lo stmt (oggetto mysqli_stmt)
     * @return mysqli_stmt lo statement da manipolare
    */
    protected final function preparedStmt($stmt){
        return $this->db->prepareStmt($stmt);
    }
    
    
    
    
    /**
     * Crea l'intero database shreal, contiene quindi lo script sql.
     * @return true se non ci sono errori nella creazione, false altrimenti
    */
    public final function createDatabase(){
        return $this->db->createDatabase();
    }
    
    
    
    protected final function disconnect(){
        $this->db->disconnect();
    }
    
    
}

?>