<?php

require(__DATAGEN_CLASSES__ . '/DtrcDevicesGen.class.php');

/**
 * The DtrcDevices class defined here contains any
 * customized code for the DtrcDevices class in the
 * Object Relational Model.  It represents the "dtrc_devices" table 
 * in the database, and extends from the code generated abstract DtrcDevicesGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 * 
 * @package My Application
 * @subpackage DataObjects
 * 
 */
class DtrcDevices extends DtrcDevicesGen {

    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objDtrcDevices->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        return sprintf('DtrcDevices Object %s', $this->strId);
    }

    public function InitDataWithTO($deviceTO) {
        if ($deviceTO instanceof DeviceTO) {
            $this->Id = $deviceTO->device_id;
            $this->EmailUser = $deviceTO->emailUser;
            $this->TokenFirebase = $deviceTO->device_tokenFirebase;
        }
    }

    public static function LoadFromId($strId) {
        // Use QuerySingle to Perform the Query
        return DtrcDevices::QuerySingle(
                        QQ::Equal(QQN::DtrcDevices()->Id, $strId)
        );
    }

    public function Save($blnForceInsert = false, $blnForceUpdate = false) {
        //check if exists a Device with the same id
        $otherDevice = DtrcDevices::Load($this->strId, $this->strEmailUser);

        if (isset($otherDevice)) {
            //exist an other device with same id
            if ($blnForceUpdate) {//is in update
                return $this->Update();
            }
            return false; //is in create
        } else {
            //does not exist an other device
            if ($blnForceUpdate) {//is in update
                return false;
            }
            return parent::Save($blnForceInsert, $blnForceUpdate);
        }
    }

    private function Update() {
        // Get the Database Object for this Class
        $objDatabase = DtrcDevices::GetDatabase();
        $mixToReturn = null;

        try {
            // Perform an UPDATE query
            // First checking for Optimistic Locking constraints (if applicable)

            if (!isset($this->__strId)) {
                $this->__strId = $this->strId;
            }

            $objDatabase->NonQuery('UPDATE
                `dtrc_devices`
                SET
                `ID` = ' . $objDatabase->SqlVariable($this->strId) . ',
                `EmailUser` = ' . $objDatabase->SqlVariable($this->strEmailUser) . ',
		`TokenFirebase` = ' . $objDatabase->SqlVariable($this->strTokenFirebase) . '
		WHERE
		`ID` = ' . $objDatabase->SqlVariable($this->__strId) . '
                AND
                `EmailUser` = ' . $objDatabase->SqlVariable($this->strEmailUser)
            );

            // Journaling
            if ($objDatabase->JournalingDatabase)
                $this->Journal('UPDATE');
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Update __blnRestored and any Non-Identity PK Columns (if applicable)
        $this->__blnRestored = true;
        $this->__strId = $this->strId;

        // Return 
        return $mixToReturn;
    }

    // Override or Create New Load/Count methods
    // (For obvious reasons, these methods are commented out...
    // but feel free to use these as a starting point)
    /*
      public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return an array of DtrcDevices objects
      return DtrcDevices::QueryArray(
      QQ::AndCondition(
      QQ::Equal(QQN::DtrcDevices()->Param1, $strParam1),
      QQ::GreaterThan(QQN::DtrcDevices()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return a single DtrcDevices object
      return DtrcDevices::QuerySingle(
      QQ::AndCondition(
      QQ::Equal(QQN::DtrcDevices()->Param1, $strParam1),
      QQ::GreaterThan(QQN::DtrcDevices()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
      // This will return a count of DtrcDevices objects
      return DtrcDevices::QueryCount(
      QQ::AndCondition(
      QQ::Equal(QQN::DtrcDevices()->Param1, $strParam1),
      QQ::Equal(QQN::DtrcDevices()->Param2, $intParam2)
      ),
      $objOptionalClauses
      );
      }

      public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
      // Performing the load manually (instead of using Qcodo Query)

      // Get the Database Object for this Class
      $objDatabase = DtrcDevices::GetDatabase();

      // Properly Escape All Input Parameters using Database->SqlVariable()
      $strParam1 = $objDatabase->SqlVariable($strParam1);
      $intParam2 = $objDatabase->SqlVariable($intParam2);

      // Setup the SQL Query
      $strQuery = sprintf('
      SELECT
      `dtrc_devices`.*
      FROM
      `dtrc_devices` AS `dtrc_devices`
      WHERE
      param_1 = %s AND
      param_2 < %s',
      $strParam1, $intParam2);

      // Perform the Query and Instantiate the Result
      $objDbResult = $objDatabase->Query($strQuery);
      return DtrcDevices::InstantiateDbResult($objDbResult);
      }
     */




    // Override or Create New Properties and Variables
    // For performance reasons, these variables and __set and __get override methods
    // are commented out.  But if you wish to implement or override any
    // of the data generated properties, please feel free to uncomment them.
    /*
      protected $strSomeNewProperty;

      public function __get($strName) {
      switch ($strName) {
      case 'SomeNewProperty': return $this->strSomeNewProperty;

      default:
      try {
      return parent::__get($strName);
      } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }
      }
      }

      public function __set($strName, $mixValue) {
      switch ($strName) {
      case 'SomeNewProperty':
      try {
      return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
      } catch (QInvalidCastException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }

      default:
      try {
      return (parent::__set($strName, $mixValue));
      } catch (QCallerException $objExc) {
      $objExc->IncrementOffset();
      throw $objExc;
      }
      }
      }
     */
}

?>