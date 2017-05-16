<?php

/**
 * Questa classe incapsula i dati per la connessione al database
 * indirizzo Host del DB, nome utente DB, password, nome database
*/
class ConnectToDB{
    
    /**
     * Costruttore inizializza i dati di connessione
    */
    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "DTRC";
    }
    
    private $host;
    private $user;
    private $password;
    private $database;
    
    private $mysqli;
    
    /**
     * Prova la connessione al db.
     * @return true se la connessione ha successo, false altrimenti
    */
    public function connect(){
        
        $this->mysqli = new mysqli( $this->host, $this->user, $this->password, $this->database );
        
        if( $this->mysqli->errno ){
            return false;
        }
        return true;
        
    }
    
    /**
     * Prepara lo statement prendendo in input il tipo di query, la tabella e i valori
     * nel formato con i ? invece dei valori. Esempi
     * INSERT INTO table(campo1, campo2, campo3) VALUES (?, ?, ?)
     * UPDATE Persone SET campo1 = ?, campo2 = ? WHERE campo3 = ?
     * L'utente della funzione deve manipolare direttamente lo stmt (oggetto mysqli_stmt)
     * @return mysqli_stmt lo statement da manipolare
    */
    public function prepareStmt($stmt){
        return $this->mysqli->prepare($stmt);
    }
    
    
    /**
     * Crea l'intero database, contiene quindi lo script sql.
     * @return true se non ci sono errori nella creazione, false altrimenti
    */
    public function createDatabase(){
        $fullScript = "


";
        
        //Ora divido la stringa in un array con ; come separatore (il ; sparirà)
        $scriptArray = explode(";", $fullScript);
        foreach($scriptArray as $stmt){
            $stmt = trim($stmt);
            
            if(strlen($stmt) == 0){
                continue;
            }
            $success = true;
            
            if(!$this->mysqli->query($stmt)){
                $success = false;
            }
        }
        
        return $success;
    }
    
    
    
    
    public function disconnect(){
        $this->mysqli->close();
    }
    
    
    
}





//--------------------------- TEST DELLA CLASSE ConnectToDb
/*
$obj = new ConnectToDB();
if($obj->connect()){
    
    //$obj->createDatabase();
    
    $stmt = $obj->prepareStmt("INSERT INTO owner (nome, cognome, email, password) VALUES (?, ?, ?, ?)");
    
    $nome = "nome"; $cognome="cognome"; $email="email3@dominio.it"; $password="passowr";
    
    
    $stmt->bind_param("ssss", $nome, $cognome, $email, $password);
    
    $stmt->execute();
    $stmt->close();
    
    --------------------------------------------------------
    
    $stmt2 = $obj->prepareStmt("SELECT email, cognome FROM owner WHERE nome = ?");
    $stmt2->bind_param("s", $nome);
    
    
    $stmt2->bind_result($email, $cognome);
    $stmt2->execute();
    while($stmt2->fetch()){//cicla su tutte le righe risultanti
        echo $email." ".$cognome."<br>";
    }
    
}
*/

?>