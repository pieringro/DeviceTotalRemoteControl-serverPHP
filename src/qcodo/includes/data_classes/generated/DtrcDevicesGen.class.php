<?php
	/**
	 * The abstract DtrcDevicesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DtrcDevices subclass which
	 * extends this DtrcDevicesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DtrcDevices class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property string $Id the value for strId (PK)
	 * @property string $EmailUser the value for strEmailUser (PK)
	 * @property string $TokenFirebase the value for strTokenFirebase 
	 * @property DtrcUsers $EmailUserObject the value for the DtrcUsers object referenced by strEmailUser (PK)
	 * @property DtrcFiles $_DtrcFilesAsIDDevices the value for the private _objDtrcFilesAsIDDevices (Read-Only) if set due to an expansion on the dtrc_files.IDDevices reverse relationship
	 * @property DtrcFiles[] $_DtrcFilesAsIDDevicesArray the value for the private _objDtrcFilesAsIDDevicesArray (Read-Only) if set due to an ExpandAsArray on the dtrc_files.IDDevices reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DtrcDevicesGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column dtrc_devices.ID
		 * @var string strId
		 */
		protected $strId;
		const IdMaxLength = 64;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strId;
		 */
		protected $__strId;

		/**
		 * Protected member variable that maps to the database PK column dtrc_devices.EmailUser
		 * @var string strEmailUser
		 */
		protected $strEmailUser;
		const EmailUserMaxLength = 64;
		const EmailUserDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strEmailUser;
		 */
		protected $__strEmailUser;

		/**
		 * Protected member variable that maps to the database column dtrc_devices.TokenFirebase
		 * @var string strTokenFirebase
		 */
		protected $strTokenFirebase;
		const TokenFirebaseMaxLength = 1024;
		const TokenFirebaseDefault = null;


		/**
		 * Private member variable that stores a reference to a single DtrcFilesAsIDDevices object
		 * (of type DtrcFiles), if this DtrcDevices object was restored with
		 * an expansion on the dtrc_files association table.
		 * @var DtrcFiles _objDtrcFilesAsIDDevices;
		 */
		private $_objDtrcFilesAsIDDevices;

		/**
		 * Private member variable that stores a reference to an array of DtrcFilesAsIDDevices objects
		 * (of type DtrcFiles[]), if this DtrcDevices object was restored with
		 * an ExpandAsArray on the dtrc_files association table.
		 * @var DtrcFiles[] _objDtrcFilesAsIDDevicesArray;
		 */
		private $_objDtrcFilesAsIDDevicesArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column dtrc_devices.EmailUser.
		 *
		 * NOTE: Always use the EmailUserObject property getter to correctly retrieve this DtrcUsers object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DtrcUsers objEmailUserObject
		 */
		protected $objEmailUserObject;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a DtrcDevices from PK Info
		 * @param string $strId
		 * @param string $strEmailUser
		 * @return DtrcDevices
		 */
		public static function Load($strId, $strEmailUser) {
			// Use QuerySingle to Perform the Query
			return DtrcDevices::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::DtrcDevices()->Id, $strId),
				QQ::Equal(QQN::DtrcDevices()->EmailUser, $strEmailUser)
				)
			);
		}

		/**
		 * Load all DtrcDeviceses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcDevices[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DtrcDevices::QueryArray to perform the LoadAll query
			try {
				return DtrcDevices::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DtrcDeviceses
		 * @return int
		 */
		public static function CountAll() {
			// Call DtrcDevices::QueryCount to perform the CountAll query
			return DtrcDevices::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Create/Build out the QueryBuilder object with DtrcDevices-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'dtrc_devices');
			DtrcDevices::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('dtrc_devices');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single DtrcDevices object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcDevices the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcDevices::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new DtrcDevices object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DtrcDevices::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return DtrcDevices::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of DtrcDevices objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcDevices[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcDevices::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DtrcDevices::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = DtrcDevices::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of DtrcDevices objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcDevices::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'dtrc_devices_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DtrcDevices-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DtrcDevices::GetSelectFields($objQueryBuilder);
				DtrcDevices::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DtrcDevices::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DtrcDevices
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'dtrc_devices';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'ID', $strAliasPrefix . 'ID');
			$objBuilder->AddSelectItem($strTableName, 'EmailUser', $strAliasPrefix . 'EmailUser');
			$objBuilder->AddSelectItem($strTableName, 'TokenFirebase', $strAliasPrefix . 'TokenFirebase');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DtrcDevices from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DtrcDevices::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return DtrcDevices
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the DtrcDevices object
			$objToReturn = new DtrcDevices();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'ID', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ID'] : $strAliasPrefix . 'ID';
			$objToReturn->strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'EmailUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'EmailUser'] : $strAliasPrefix . 'EmailUser';
			$objToReturn->strEmailUser = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strEmailUser = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'TokenFirebase', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'TokenFirebase'] : $strAliasPrefix . 'TokenFirebase';
			$objToReturn->strTokenFirebase = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'dtrc_devices__';

			// Check for EmailUserObject Early Binding
			$strAlias = $strAliasPrefix . 'EmailUser__Email';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEmailUserObject = DtrcUsers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'EmailUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for DtrcFilesAsIDDevices Virtual Binding
			$strAlias = $strAliasPrefix . 'dtrcfilesasiddevices__ID';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDtrcFilesAsIDDevicesArray[] = DtrcFiles::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcfilesasiddevices__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDtrcFilesAsIDDevices = DtrcFiles::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcfilesasiddevices__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of DtrcDeviceses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return DtrcDevices[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DtrcDevices::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DtrcDevices::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single DtrcDevices object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DtrcDevices next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return DtrcDevices::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DtrcDevices object,
		 * by Id, EmailUser Index(es)
		 * @param string $strId
		 * @param string $strEmailUser
		 * @return DtrcDevices
		*/
		public static function LoadByIdEmailUser($strId, $strEmailUser, $objOptionalClauses = null) {
			return DtrcDevices::QuerySingle(
				QQ::AndCondition(
				QQ::Equal(QQN::DtrcDevices()->Id, $strId),
				QQ::Equal(QQN::DtrcDevices()->EmailUser, $strEmailUser)
				)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of DtrcDevices objects,
		 * by EmailUser Index(es)
		 * @param string $strEmailUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcDevices[]
		*/
		public static function LoadArrayByEmailUser($strEmailUser, $objOptionalClauses = null) {
			// Call DtrcDevices::QueryArray to perform the LoadArrayByEmailUser query
			try {
				return DtrcDevices::QueryArray(
					QQ::Equal(QQN::DtrcDevices()->EmailUser, $strEmailUser),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DtrcDeviceses
		 * by EmailUser Index(es)
		 * @param string $strEmailUser
		 * @return int
		*/
		public static function CountByEmailUser($strEmailUser, $objOptionalClauses = null) {
			// Call DtrcDevices::QueryCount to perform the CountByEmailUser query
			return DtrcDevices::QueryCount(
				QQ::Equal(QQN::DtrcDevices()->EmailUser, $strEmailUser)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this DtrcDevices
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `dtrc_devices` (
							`ID`,
							`EmailUser`,
							`TokenFirebase`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strId) . ',
							' . $objDatabase->SqlVariable($this->strEmailUser) . ',
							' . $objDatabase->SqlVariable($this->strTokenFirebase) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`dtrc_devices`
						SET
							`ID` = ' . $objDatabase->SqlVariable($this->strId) . ',
							`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmailUser) . ',
							`TokenFirebase` = ' . $objDatabase->SqlVariable($this->strTokenFirebase) . '
						WHERE
							`ID` = ' . $objDatabase->SqlVariable($this->__strId) . ' AND
							`EmailUser` = ' . $objDatabase->SqlVariable($this->__strEmailUser) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strId = $this->strId;
			$this->__strEmailUser = $this->strEmailUser;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this DtrcDevices
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DtrcDevices with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_devices`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($this->strId) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmailUser) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all DtrcDeviceses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_devices`');
		}

		/**
		 * Truncate dtrc_devices table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `dtrc_devices`');
		}

		/**
		 * Reload this DtrcDevices from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DtrcDevices object.');

			// Reload the Object
			$objReloaded = DtrcDevices::Load($this->strId, $this->strEmailUser);

			// Update $this's local variables to match
			$this->strId = $objReloaded->strId;
			$this->__strId = $this->strId;
			$this->EmailUser = $objReloaded->EmailUser;
			$this->__strEmailUser = $this->strEmailUser;
			$this->strTokenFirebase = $objReloaded->strTokenFirebase;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = DtrcDevices::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `dtrc_devices` (
					`ID`,
					`EmailUser`,
					`TokenFirebase`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->strId) . ',
					' . $objDatabase->SqlVariable($this->strEmailUser) . ',
					' . $objDatabase->SqlVariable($this->strTokenFirebase) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer strId
		 * @return DtrcDevices[]
		 */
		public static function GetJournalForId($strId) {
			$objDatabase = DtrcDevices::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM dtrc_devices WHERE ID = ' .
				$objDatabase->SqlVariable($strId) . ' ORDER BY __sys_date');

			return DtrcDevices::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return DtrcDevices[]
		 */
		public function GetJournal() {
			return DtrcDevices::GetJournalForId($this->strId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for strId (PK)
					// @return string
					return $this->strId;

				case 'EmailUser':
					// Gets the value for strEmailUser (PK)
					// @return string
					return $this->strEmailUser;

				case 'TokenFirebase':
					// Gets the value for strTokenFirebase 
					// @return string
					return $this->strTokenFirebase;


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailUserObject':
					// Gets the value for the DtrcUsers object referenced by strEmailUser (PK)
					// @return DtrcUsers
					try {
						if ((!$this->objEmailUserObject) && (!is_null($this->strEmailUser)))
							$this->objEmailUserObject = DtrcUsers::Load($this->strEmailUser);
						return $this->objEmailUserObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_DtrcFilesAsIDDevices':
					// Gets the value for the private _objDtrcFilesAsIDDevices (Read-Only)
					// if set due to an expansion on the dtrc_files.IDDevices reverse relationship
					// @return DtrcFiles
					return $this->_objDtrcFilesAsIDDevices;

				case '_DtrcFilesAsIDDevicesArray':
					// Gets the value for the private _objDtrcFilesAsIDDevicesArray (Read-Only)
					// if set due to an ExpandAsArray on the dtrc_files.IDDevices reverse relationship
					// @return DtrcFiles[]
					return (array) $this->_objDtrcFilesAsIDDevicesArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Sets the value for strId (PK)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailUser':
					// Sets the value for strEmailUser (PK)
					// @param string $mixValue
					// @return string
					try {
						$this->objEmailUserObject = null;
						return ($this->strEmailUser = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TokenFirebase':
					// Sets the value for strTokenFirebase 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTokenFirebase = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailUserObject':
					// Sets the value for the DtrcUsers object referenced by strEmailUser (PK)
					// @param DtrcUsers $mixValue
					// @return DtrcUsers
					if (is_null($mixValue)) {
						$this->strEmailUser = null;
						$this->objEmailUserObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DtrcUsers object
						try {
							$mixValue = QType::Cast($mixValue, 'DtrcUsers');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED DtrcUsers object
						if (is_null($mixValue->Email))
							throw new QCallerException('Unable to set an unsaved EmailUserObject for this DtrcDevices');

						// Update Local Member Variables
						$this->objEmailUserObject = $mixValue;
						$this->strEmailUser = $mixValue->Email;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for DtrcFilesAsIDDevices
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DtrcFilesesAsIDDevices as an array of DtrcFiles objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcFiles[]
		*/ 
		public function GetDtrcFilesAsIDDevicesArray($objOptionalClauses = null) {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				return array();

			try {
				return DtrcFiles::LoadArrayByIDDevices($this->strId, $this->strEmailUser, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DtrcFilesesAsIDDevices
		 * @return int
		*/ 
		public function CountDtrcFilesesAsIDDevices() {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				return 0;

			return DtrcFiles::CountByIDDevices($this->strId, $this->strEmailUser);
		}

		/**
		 * Associates a DtrcFilesAsIDDevices
		 * @param DtrcFiles $objDtrcFiles
		 * @return void
		*/ 
		public function AssociateDtrcFilesAsIDDevices(DtrcFiles $objDtrcFiles) {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcFilesAsIDDevices on this unsaved DtrcDevices.');
			if ((is_null($objDtrcFiles->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcFilesAsIDDevices on this DtrcDevices with an unsaved DtrcFiles.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_files`
				SET
					`IDDevices` = ' . $objDatabase->SqlVariable($this->strId) . '
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcFiles->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objDtrcFiles->IDDevices = $this->strId;
				$objDtrcFiles->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a DtrcFilesAsIDDevices
		 * @param DtrcFiles $objDtrcFiles
		 * @return void
		*/ 
		public function UnassociateDtrcFilesAsIDDevices(DtrcFiles $objDtrcFiles) {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this unsaved DtrcDevices.');
			if ((is_null($objDtrcFiles->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this DtrcDevices with an unsaved DtrcFiles.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_files`
				SET
					`IDDevices` = null
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcFiles->Id) . ' AND
					`IDDevices` = ' . $objDatabase->SqlVariable($this->strId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcFiles->IDDevices = null;
				$objDtrcFiles->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all DtrcFilesesAsIDDevices
		 * @return void
		*/ 
		public function UnassociateAllDtrcFilesesAsIDDevices() {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this unsaved DtrcDevices.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcFiles::LoadArrayByIDDevices($this->strId) as $objDtrcFiles) {
					$objDtrcFiles->IDDevices = null;
					$objDtrcFiles->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_files`
				SET
					`IDDevices` = null
				WHERE
					`IDDevices` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes an associated DtrcFilesAsIDDevices
		 * @param DtrcFiles $objDtrcFiles
		 * @return void
		*/ 
		public function DeleteAssociatedDtrcFilesAsIDDevices(DtrcFiles $objDtrcFiles) {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this unsaved DtrcDevices.');
			if ((is_null($objDtrcFiles->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this DtrcDevices with an unsaved DtrcFiles.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_files`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcFiles->Id) . ' AND
					`IDDevices` = ' . $objDatabase->SqlVariable($this->strId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcFiles->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated DtrcFilesesAsIDDevices
		 * @return void
		*/ 
		public function DeleteAllDtrcFilesesAsIDDevices() {
			if ((is_null($this->strId)) || (is_null($this->strEmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcFilesAsIDDevices on this unsaved DtrcDevices.');

			// Get the Database Object for this Class
			$objDatabase = DtrcDevices::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcFiles::LoadArrayByIDDevices($this->strId) as $objDtrcFiles) {
					$objDtrcFiles->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_files`
				WHERE
					`IDDevices` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DtrcDevices"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailUserObject" type="xsd1:DtrcUsers"/>';
			$strToReturn .= '<element name="TokenFirebase" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DtrcDevices', $strComplexTypeArray)) {
				$strComplexTypeArray['DtrcDevices'] = DtrcDevices::GetSoapComplexTypeXml();
				DtrcUsers::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DtrcDevices::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DtrcDevices();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->strId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'EmailUserObject')) &&
				($objSoapObject->EmailUserObject))
				$objToReturn->EmailUserObject = DtrcUsers::GetObjectFromSoapObject($objSoapObject->EmailUserObject);
			if (property_exists($objSoapObject, 'TokenFirebase'))
				$objToReturn->strTokenFirebase = $objSoapObject->TokenFirebase;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DtrcDevices::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objEmailUserObject)
				$objObject->objEmailUserObject = DtrcUsers::GetSoapObjectFromObject($objObject->objEmailUserObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strEmailUser = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $EmailUser
	 * @property-read QQNodeDtrcUsers $EmailUserObject
	 * @property-read QQNode $TokenFirebase
	 * @property-read QQReverseReferenceNodeDtrcFiles $DtrcFilesAsIDDevices
	 */
	class QQNodeDtrcDevices extends QQNode {
		protected $strTableName = 'dtrc_devices';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcDevices';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'string', $this);
				case 'EmailUser':
					return new QQNode('EmailUser', 'EmailUser', 'string', $this);
				case 'EmailUserObject':
					return new QQNodeDtrcUsers('EmailUser', 'EmailUserObject', 'string', $this);
				case 'TokenFirebase':
					return new QQNode('TokenFirebase', 'TokenFirebase', 'string', $this);
				case 'DtrcFilesAsIDDevices':
					return new QQReverseReferenceNodeDtrcFiles($this, 'dtrcfilesasiddevices', 'reverse_reference', 'IDDevices');

				case '_PrimaryKeyNode':
					return new QQNode('ID', 'Id', 'string', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $EmailUser
	 * @property-read QQNodeDtrcUsers $EmailUserObject
	 * @property-read QQNode $TokenFirebase
	 * @property-read QQReverseReferenceNodeDtrcFiles $DtrcFilesAsIDDevices
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDtrcDevices extends QQReverseReferenceNode {
		protected $strTableName = 'dtrc_devices';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcDevices';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'string', $this);
				case 'EmailUser':
					return new QQNode('EmailUser', 'EmailUser', 'string', $this);
				case 'EmailUserObject':
					return new QQNodeDtrcUsers('EmailUser', 'EmailUserObject', 'string', $this);
				case 'TokenFirebase':
					return new QQNode('TokenFirebase', 'TokenFirebase', 'string', $this);
				case 'DtrcFilesAsIDDevices':
					return new QQReverseReferenceNodeDtrcFiles($this, 'dtrcfilesasiddevices', 'reverse_reference', 'IDDevices');

				case '_PrimaryKeyNode':
					return new QQNode('ID', 'Id', 'string', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>