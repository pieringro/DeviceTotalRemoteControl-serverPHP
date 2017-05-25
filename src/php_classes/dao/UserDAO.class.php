<?php
require_once("AbstractDAO.class.php");

/**
 * Entita del dispositivo.
 * Ogni dispositivo e' collegato all'account del proprietario
 */
class UserDAO extends AbstractDAO {

    private $table;
    private $fullFields;
    private $selectFields;
    private $fakeValues;

    function __construct() {
        $this->table = "dtrc_users";
        $this->fullFields = "Email, Pass";
        $this->selectFields = "Email";
        $this->fakeValues = "?, ?";
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

            $email = $to->email;
            $pass = $to->pass;

            $stmt->bind_param("ss", $email, $pass);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                throw new Exception("Error user creation: " . $stmt->error);
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

        $email = $to->email;
        $pass = $to->pass;

        if (!(isset($email) && isset($pass))) {
            return null;
        }

        if ($this->connect()) {

            $stmt = $this->preparedStmt(
                    "SELECT " . $this->selectFields . " FROM " . $this->table
                    . " WHERE Email = ? and Pass = ?");

            $stmt->bind_param("ss", $email, $pass);

            $stmt->bind_result($emailResult);

            $stmt->execute();

            if ($stmt->errno || $stmt->error) {
                $this->disconnect();
                return null;
            }

            $stmt->fetch();
            $this->disconnect();

            if ($emailResult == null) {
                return null;
            } else {
                $to->email = $emailResult;
                $to->pass = $pass;
                return $to;
            }
        } else {
            throw new Exception("Database connection error");
        }
    }

    public function update($oldTO, $newTO) {
        if ($this->connect()) {
            
            $stmt = $this->preparedStmt(
                    "UPDATE " . $this->table . " SET pass = ? "
                    . "WHERE email = '" . $oldTO->email . "' "
                    . "and pass = '" . $oldTO->pass . "'");

            $newPass = $newTO->device_tokenFirebase;
            
            $stmt->bind_param("s", $newPass);

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