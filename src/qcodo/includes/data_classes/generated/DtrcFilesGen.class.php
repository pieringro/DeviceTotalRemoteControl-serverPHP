<?php
	/**
	 * The abstract DtrcFilesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DtrcFiles subclass which
	 * extends this DtrcFilesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DtrcFiles class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $IDDevices the value for strIDDevices (Not Null)
	 * @property string $Path the value for strPath 
	 * @property string $Type the value for strType 
	 * @property DtrcDevices $IDDevicesObject the value for the DtrcDevices object referenced by strIDDevices (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DtrcFilesGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column dtrc_files.ID
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column dtrc_files.IDDevices
		 * @var string strIDDevices
		 */
		protected $strIDDevices;
		const IDDevicesMaxLength = 64;
		const IDDevicesDefault = null;


		/**
		 * Protected member variable that maps to the database column dtrc_files.Path
		 * @var string strPath
		 */
		protected $strPath;
		const PathMaxLength = 128;
		const PathDefault = null;


		/**
		 * Protected member variable that maps to the database column dtrc_files.Type
		 * @var string strType
		 */
		protected $strType;
		const TypeMaxLength = 64;
		const TypeDefault = null;


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
		 * in the database column dtrc_files.IDDevices.
		 *
		 * NOTE: Always use the IDDevicesObject property getter to correctly retrieve this DtrcDevices object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var DtrcDevices objIDDevicesObject
		 */
		protected $objIDDevicesObject;





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
		 * Load a DtrcFiles from PK Info
		 * @param integer $intId
		 * @return DtrcFiles
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return DtrcFiles::QuerySingle(
				QQ::Equal(QQN::DtrcFiles()->Id, $intId)
			);
		}

		/**
		 * Load all DtrcFileses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcFiles[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DtrcFiles::QueryArray to perform the LoadAll query
			try {
				return DtrcFiles::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DtrcFileses
		 * @return int
		 */
		public static function CountAll() {
			// Call DtrcFiles::QueryCount to perform the CountAll query
			return DtrcFiles::QueryCount(QQ::All());
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
			$objDatabase = DtrcFiles::GetDatabase();

			// Create/Build out the QueryBuilder object with DtrcFiles-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'dtrc_files');
			DtrcFiles::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('dtrc_files');

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
		 * Static Qcodo Query method to query for a single DtrcFiles object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcFiles the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcFiles::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new DtrcFiles object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DtrcFiles::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return DtrcFiles::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of DtrcFiles objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcFiles[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcFiles::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DtrcFiles::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DtrcFiles::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of DtrcFiles objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcFiles::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DtrcFiles::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'dtrc_files_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DtrcFiles-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DtrcFiles::GetSelectFields($objQueryBuilder);
				DtrcFiles::GetFromFields($objQueryBuilder);

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
			return DtrcFiles::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DtrcFiles
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'dtrc_files';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'ID', $strAliasPrefix . 'ID');
			$objBuilder->AddSelectItem($strTableName, 'IDDevices', $strAliasPrefix . 'IDDevices');
			$objBuilder->AddSelectItem($strTableName, 'Path', $strAliasPrefix . 'Path');
			$objBuilder->AddSelectItem($strTableName, 'Type', $strAliasPrefix . 'Type');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DtrcFiles from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DtrcFiles::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return DtrcFiles
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the DtrcFiles object
			$objToReturn = new DtrcFiles();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'ID', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ID'] : $strAliasPrefix . 'ID';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'IDDevices', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'IDDevices'] : $strAliasPrefix . 'IDDevices';
			$objToReturn->strIDDevices = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Path', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Path'] : $strAliasPrefix . 'Path';
			$objToReturn->strPath = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Type'] : $strAliasPrefix . 'Type';
			$objToReturn->strType = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'dtrc_files__';

			// Check for IDDevicesObject Early Binding
			$strAlias = $strAliasPrefix . 'IDDevices__ID';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIDDevicesObject = DtrcDevices::InstantiateDbRow($objDbRow, $strAliasPrefix . 'IDDevices__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of DtrcFileses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return DtrcFiles[]
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
					$objItem = DtrcFiles::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DtrcFiles::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single DtrcFiles object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DtrcFiles next row resulting from the query
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
			return DtrcFiles::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DtrcFiles object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return DtrcFiles
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return DtrcFiles::QuerySingle(
				QQ::Equal(QQN::DtrcFiles()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of DtrcFiles objects,
		 * by IDDevices Index(es)
		 * @param string $strIDDevices
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcFiles[]
		*/
		public static function LoadArrayByIDDevices($strIDDevices, $objOptionalClauses = null) {
			// Call DtrcFiles::QueryArray to perform the LoadArrayByIDDevices query
			try {
				return DtrcFiles::QueryArray(
					QQ::Equal(QQN::DtrcFiles()->IDDevices, $strIDDevices),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DtrcFileses
		 * by IDDevices Index(es)
		 * @param string $strIDDevices
		 * @return int
		*/
		public static function CountByIDDevices($strIDDevices, $objOptionalClauses = null) {
			// Call DtrcFiles::QueryCount to perform the CountByIDDevices query
			return DtrcFiles::QueryCount(
				QQ::Equal(QQN::DtrcFiles()->IDDevices, $strIDDevices)
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
		 * Save this DtrcFiles
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DtrcFiles::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `dtrc_files` (
							`IDDevices`,
							`Path`,
							`Type`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strIDDevices) . ',
							' . $objDatabase->SqlVariable($this->strPath) . ',
							' . $objDatabase->SqlVariable($this->strType) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('dtrc_files', 'ID');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`dtrc_files`
						SET
							`IDDevices` = ' . $objDatabase->SqlVariable($this->strIDDevices) . ',
							`Path` = ' . $objDatabase->SqlVariable($this->strPath) . ',
							`Type` = ' . $objDatabase->SqlVariable($this->strType) . '
						WHERE
							`ID` = ' . $objDatabase->SqlVariable($this->intId) . '
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


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this DtrcFiles
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DtrcFiles with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DtrcFiles::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_files`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all DtrcFileses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DtrcFiles::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_files`');
		}

		/**
		 * Truncate dtrc_files table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DtrcFiles::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `dtrc_files`');
		}

		/**
		 * Reload this DtrcFiles from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DtrcFiles object.');

			// Reload the Object
			$objReloaded = DtrcFiles::Load($this->intId);

			// Update $this's local variables to match
			$this->IDDevices = $objReloaded->IDDevices;
			$this->strPath = $objReloaded->strPath;
			$this->strType = $objReloaded->strType;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = DtrcFiles::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `dtrc_files` (
					`ID`,
					`IDDevices`,
					`Path`,
					`Type`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strIDDevices) . ',
					' . $objDatabase->SqlVariable($this->strPath) . ',
					' . $objDatabase->SqlVariable($this->strType) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return DtrcFiles[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = DtrcFiles::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM dtrc_files WHERE ID = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return DtrcFiles::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return DtrcFiles[]
		 */
		public function GetJournal() {
			return DtrcFiles::GetJournalForId($this->intId);
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
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'IDDevices':
					// Gets the value for strIDDevices (Not Null)
					// @return string
					return $this->strIDDevices;

				case 'Path':
					// Gets the value for strPath 
					// @return string
					return $this->strPath;

				case 'Type':
					// Gets the value for strType 
					// @return string
					return $this->strType;


				///////////////////
				// Member Objects
				///////////////////
				case 'IDDevicesObject':
					// Gets the value for the DtrcDevices object referenced by strIDDevices (Not Null)
					// @return DtrcDevices
					try {
						if ((!$this->objIDDevicesObject) && (!is_null($this->strIDDevices)))
							$this->objIDDevicesObject = DtrcDevices::Load($this->strIDDevices);
						return $this->objIDDevicesObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'IDDevices':
					// Sets the value for strIDDevices (Not Null)
					// @param string $mixValue
					// @return string
					try {
						$this->objIDDevicesObject = null;
						return ($this->strIDDevices = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Path':
					// Sets the value for strPath 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPath = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Type':
					// Sets the value for strType 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strType = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'IDDevicesObject':
					// Sets the value for the DtrcDevices object referenced by strIDDevices (Not Null)
					// @param DtrcDevices $mixValue
					// @return DtrcDevices
					if (is_null($mixValue)) {
						$this->strIDDevices = null;
						$this->objIDDevicesObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a DtrcDevices object
						try {
							$mixValue = QType::Cast($mixValue, 'DtrcDevices');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED DtrcDevices object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved IDDevicesObject for this DtrcFiles');

						// Update Local Member Variables
						$this->objIDDevicesObject = $mixValue;
						$this->strIDDevices = $mixValue->Id;

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DtrcFiles"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="IDDevicesObject" type="xsd1:DtrcDevices"/>';
			$strToReturn .= '<element name="Path" type="xsd:string"/>';
			$strToReturn .= '<element name="Type" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DtrcFiles', $strComplexTypeArray)) {
				$strComplexTypeArray['DtrcFiles'] = DtrcFiles::GetSoapComplexTypeXml();
				DtrcDevices::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DtrcFiles::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DtrcFiles();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'IDDevicesObject')) &&
				($objSoapObject->IDDevicesObject))
				$objToReturn->IDDevicesObject = DtrcDevices::GetObjectFromSoapObject($objSoapObject->IDDevicesObject);
			if (property_exists($objSoapObject, 'Path'))
				$objToReturn->strPath = $objSoapObject->Path;
			if (property_exists($objSoapObject, 'Type'))
				$objToReturn->strType = $objSoapObject->Type;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DtrcFiles::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIDDevicesObject)
				$objObject->objIDDevicesObject = DtrcDevices::GetSoapObjectFromObject($objObject->objIDDevicesObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strIDDevices = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $IDDevices
	 * @property-read QQNodeDtrcDevices $IDDevicesObject
	 * @property-read QQNode $Path
	 * @property-read QQNode $Type
	 */
	class QQNodeDtrcFiles extends QQNode {
		protected $strTableName = 'dtrc_files';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcFiles';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'integer', $this);
				case 'IDDevices':
					return new QQNode('IDDevices', 'IDDevices', 'string', $this);
				case 'IDDevicesObject':
					return new QQNodeDtrcDevices('IDDevices', 'IDDevicesObject', 'string', $this);
				case 'Path':
					return new QQNode('Path', 'Path', 'string', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('ID', 'Id', 'integer', $this);
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
	 * @property-read QQNode $IDDevices
	 * @property-read QQNodeDtrcDevices $IDDevicesObject
	 * @property-read QQNode $Path
	 * @property-read QQNode $Type
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDtrcFiles extends QQReverseReferenceNode {
		protected $strTableName = 'dtrc_files';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcFiles';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'integer', $this);
				case 'IDDevices':
					return new QQNode('IDDevices', 'IDDevices', 'string', $this);
				case 'IDDevicesObject':
					return new QQNodeDtrcDevices('IDDevices', 'IDDevicesObject', 'string', $this);
				case 'Path':
					return new QQNode('Path', 'Path', 'string', $this);
				case 'Type':
					return new QQNode('Type', 'Type', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('ID', 'Id', 'integer', $this);
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