<?php

require_once("AbstractDAO.class.php");

/**
 * Entita del dispositivo.
 * Ogni dispositivo e' collegato all'account del proprietario
*/
public class DeviceEntity extends AbstractDAO {
    private $table;
    private $fullFields;
    private $selectFields;
    private $fakeValues;

    function __construct(){
        $this->table = "";
        $this->fullFields = "device_id, device_tokenFirebase";
        $this->selectFields = "device_id, device_tokenFirebase";
        $this->fakeValues = "?, ?";
    }

        
    /**
     * Crea un nuovo record della tabella con i dati passati attraverso il to.
     *
     * @throws Exception se si verifica qualche errore nel dialogo con il db
    */
    public function create($to){
        
        if($this->connect()){
            
            $stmt = $this->preparedStmt(
                "INSERT INTO ".$this->table." ( ".$this->fullFields.
                    " ) VALUES ( ".$this->fakeValues." )");
            
            $device_id = $to->getDeviceId();
            $device_tokenFirebase = $to->getDeviceTokenFirebase();

            $stmt->bind_param("ss", $device_id, $device_tokenFirebase);
            
            $stmt->execute();
            
            if($stmt->errno || $stmt->error){
                $this->disconnect();
//              printf("Error: %s.\n", $stmt->error);
                throw new Exception("Error place: ". $stmt->error);
//              return false;
            }
            
            return true;
        }
        else{
            throw new Exception("Errore di connessione al database");
        }
    }




    /**
     * Legge dalla tabella secondo le informazioni ottenute dal to
     * @return un TO con tutte le informazioni
     * @throws Exception se si verifica qualche errore nel dialogo con il db
    */
    public function read($to){
        
        $device_id = $to->getDeviceId();
        $device_tokenFirebase = $to->getDeviceTokenFirebase();
        
        if( !(isset($device_id) && isset($device_tokenFirebase)) ){
            return null;
        }
        
        if($this->connect()){
            
            $stmt = $this->preparedStmt(
                "SELECT ".$this->selectFields." FROM ".$this->table." WHERE device_id = ? and device_tokenFirebase = ?");
            
            $stmt->bind_param("ss", $device_id, $device_tokenFirebase);
            
            $stmt->bind_result($device_id, $device_tokenFirebase);
            
            $stmt->execute();
            
            if($stmt->errno || $stmt->error){
                $this->disconnect();
                return null;
            }
            
            $stmt->fetch();
            $this->disconnect();
            
            if($device_id==null || $device_tokenFirebase==null){
                return null;
            }
            else{
                $to->setDeviceId($device_id);
                $to->setDeviceTokenFirebase($device_tokenFirebase);
                return $to;
            }    
        }
        else{
            throw new Exception("Database connection error");
        }
    }
    
    
    
    public function update($oldTO, $newTO){
    
    
    }
   
    
    
    
    /**
     * Cancella un record dalla tabella
     * @return true se la cancellazione ha successo, false altrimenti
     * @throws Exception se si verifica qualche errore nel dialogo con il db
    */
    public function delete($to){
        if($this->connect()){
            $stmt = $this->preparedStmt(
                "DELETE FROM ".$this->table." WHERE device_id = ? and device_tokenFirebase = ?");
            
            $device_id = $to->getDeviceId();
            $device_tokenFirebase = $to->getDeviceTokenFirebase();
            
            $stmt->bind_param("dd", $device_id, $device_tokenFirebase);
            
            $stmt->execute();
            
            if($stmt->errno || $stmt->error){
                $this->disconnect();
                return false;
            }
            $this->disconnect();
            return true;
            
        }
        else{
            throw new Exception("Errore di connessione al database");
        }
    }


    

}


?>