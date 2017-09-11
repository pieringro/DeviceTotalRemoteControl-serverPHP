<?php
require_once("AbstractDAO.class.php");

/**
 * Entita del dispositivo.
 * Ogni dispositivo e' collegato all'account del proprietario
 */
class DeviceDAO extends AbstractDAO {

    private $table;
    private $fullFields;
    private $selectFields;
    private $fakeValues;

    function __construct() {
        $this->table = "dtrc_devices";
        $this->fullFields = "id, tokenFirebase, emailuser";
        $this->selectFields = "id, tokenFirebase, emailuser";
        $this->fakeValues = "?, ?, ?";
    }

    /**
     * Crea un nuovo record della tabella con i dati passati attraverso il to.
     * @return true se la creazione ha successo
     * @throws Exception se si verifica qualche errore nel dialogo con il db
     */
    public function create($to) {

        if ($this->connect()) {

            $stmt = $this->preparedStmt(
                    "INSERT INTO " . $this->table . " ( " . $this->fullFields .
                    " ) VALUES ( " . $this->fakeValues . " )");

            $device_id = $to->device_id;
            $device_tokenFirebase = $to->device_tokenFirebase;
            $device_userId = $to->emailUser;

            $stmt->bind_param("sss", $device_id, $device_tokenFirebase, $device_userId);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                throw new Exception("Error device creation: " . $stmt->error);
            }

            return true;
        } else {
            throw new Exception("Errore di connessione al database");
        }
    }

    /**
     * Legge dalla tabella secondo le informazioni ottenute dal to
     * @return un TO con tutte le informazioni
     * @throws Exception se si verifica qualche errore nel dialogo con il db
     */
    public function read($to) {

        $device_id = $to->getDeviceId();
        $device_tokenFirebase = $to->getDeviceTokenFirebase();

        if (!(isset($device_id) && isset($device_tokenFirebase))) {
            return null;
        }

        if ($this->connect()) {

            $stmt = $this->preparedStmt(
                    "SELECT " . $this->selectFields . " FROM " . $this->table
                    . " WHERE device_id = ? and device_tokenFirebase = ?");

            $stmt->bind_param("ss", $device_id, $device_tokenFirebase);

            $stmt->bind_result($device_id, $device_tokenFirebase);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                return null;
            }

            $stmt->fetch();
            $this->disconnect();

            if ($device_id == null || $device_tokenFirebase == null) {
                return null;
            } else {
                $to->setDeviceId($device_id);
                $to->setDeviceTokenFirebase($device_tokenFirebase);
                return $to;
            }
        } else {
            throw new Exception("Database connection error");
        }
    }

    public function update($oldTO, $newTO) {
        if ($this->connect()) {
            
            $stmt = $this->preparedStmt(
                    "UPDATE " . $this->table . " SET tokenFirebase = ? "
                    . "WHERE emailUser = '" . $oldTO->emailUser . "' "
                    . "and Id = '" . $oldTO->device_id . "'");

            $device_tokenFirebase = $newTO->device_tokenFirebase;
            
            $stmt->bind_param("s", $device_tokenFirebase);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                throw new Exception("Error device updating: " . $stmt->error);
            }

            $this->disconnect();

            return true;
        } else {
            throw new Exception("Database connection error");
        }
    }

    /**
     * Cancella un record dalla tabella
     * @return true se la cancellazione ha successo, false altrimenti
     * @throws Exception se si verifica qualche errore nel dialogo con il db
     */
    public function delete($to) {
        if ($this->connect()) {
            $stmt = $this->preparedStmt(
                    "DELETE FROM " . $this->table . " WHERE device_id = ? and device_tokenFirebase = ?");

            $device_id = $to->getDeviceId();
            $device_tokenFirebase = $to->getDeviceTokenFirebase();

            $stmt->bind_param("dd", $device_id, $device_tokenFirebase);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                return false;
            }
            $this->disconnect();
            return true;
        } else {
            throw new Exception("Errore di connessione al database");
        }
    }

}

?>