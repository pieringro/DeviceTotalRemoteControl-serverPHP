<?php
	/**
	 * The abstract DtrcPendingEmailUserConfirmationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DtrcPendingEmailUserConfirmation subclass which
	 * extends this DtrcPendingEmailUserConfirmationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DtrcPendingEmailUserConfirmation class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property string $Id the value for strId (PK)
	 * @property string $EmailUser the value for strEmailUser 
	 * @property DtrcUsers $EmailUserObject the value for the DtrcUsers object referenced by strEmailUser 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DtrcPendingEmailUserConfirmationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column dtrc_pending_email_user_confirmation.ID
		 * @var string strId
		 */
		protected $strId;
		const IdMaxLength = 36;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strId;
		 */
		protected $__strId;

		/**
		 * Protected member variable that maps to the database column dtrc_pending_email_user_confirmation.EmailUser
		 * @var string strEmailUser
		 */
		protected $strEmailUser;
		const EmailUserMaxLength = 64;
		const EmailUserDefault = null;


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
		 * in the database column dtrc_pending_email_user_confirmation.EmailUser.
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
		 * Load a DtrcPendingEmailUserConfirmation from PK Info
		 * @param string $strId
		 * @return DtrcPendingEmailUserConfirmation
		 */
		public static function Load($strId) {
			// Use QuerySingle to Perform the Query
			return DtrcPendingEmailUserConfirmation::QuerySingle(
				QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Id, $strId)
			);
		}

		/**
		 * Load all DtrcPendingEmailUserConfirmations
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcPendingEmailUserConfirmation[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DtrcPendingEmailUserConfirmation::QueryArray to perform the LoadAll query
			try {
				return DtrcPendingEmailUserConfirmation::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DtrcPendingEmailUserConfirmations
		 * @return int
		 */
		public static function CountAll() {
			// Call DtrcPendingEmailUserConfirmation::QueryCount to perform the CountAll query
			return DtrcPendingEmailUserConfirmation::QueryCount(QQ::All());
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
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			// Create/Build out the QueryBuilder object with DtrcPendingEmailUserConfirmation-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'dtrc_pending_email_user_confirmation');
			DtrcPendingEmailUserConfirmation::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('dtrc_pending_email_user_confirmation');

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
		 * Static Qcodo Query method to query for a single DtrcPendingEmailUserConfirmation object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcPendingEmailUserConfirmation the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcPendingEmailUserConfirmation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new DtrcPendingEmailUserConfirmation object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of DtrcPendingEmailUserConfirmation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcPendingEmailUserConfirmation[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcPendingEmailUserConfirmation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DtrcPendingEmailUserConfirmation::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DtrcPendingEmailUserConfirmation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of DtrcPendingEmailUserConfirmation objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcPendingEmailUserConfirmation::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'dtrc_pending_email_user_confirmation_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DtrcPendingEmailUserConfirmation-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DtrcPendingEmailUserConfirmation::GetSelectFields($objQueryBuilder);
				DtrcPendingEmailUserConfirmation::GetFromFields($objQueryBuilder);

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
			return DtrcPendingEmailUserConfirmation::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DtrcPendingEmailUserConfirmation
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'dtrc_pending_email_user_confirmation';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'ID', $strAliasPrefix . 'ID');
			$objBuilder->AddSelectItem($strTableName, 'EmailUser', $strAliasPrefix . 'EmailUser');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DtrcPendingEmailUserConfirmation from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DtrcPendingEmailUserConfirmation::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return DtrcPendingEmailUserConfirmation
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the DtrcPendingEmailUserConfirmation object
			$objToReturn = new DtrcPendingEmailUserConfirmation();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'ID', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ID'] : $strAliasPrefix . 'ID';
			$objToReturn->strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'EmailUser', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'EmailUser'] : $strAliasPrefix . 'EmailUser';
			$objToReturn->strEmailUser = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'dtrc_pending_email_user_confirmation__';

			// Check for EmailUserObject Early Binding
			$strAlias = $strAliasPrefix . 'EmailUser__Email';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objEmailUserObject = DtrcUsers::InstantiateDbRow($objDbRow, $strAliasPrefix . 'EmailUser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of DtrcPendingEmailUserConfirmations from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return DtrcPendingEmailUserConfirmation[]
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
					$objItem = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single DtrcPendingEmailUserConfirmation object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DtrcPendingEmailUserConfirmation next row resulting from the query
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
			return DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DtrcPendingEmailUserConfirmation object,
		 * by Id Index(es)
		 * @param string $strId
		 * @return DtrcPendingEmailUserConfirmation
		*/
		public static function LoadById($strId, $objOptionalClauses = null) {
			return DtrcPendingEmailUserConfirmation::QuerySingle(
				QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Id, $strId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of DtrcPendingEmailUserConfirmation objects,
		 * by EmailUser Index(es)
		 * @param string $strEmailUser
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcPendingEmailUserConfirmation[]
		*/
		public static function LoadArrayByEmailUser($strEmailUser, $objOptionalClauses = null) {
			// Call DtrcPendingEmailUserConfirmation::QueryArray to perform the LoadArrayByEmailUser query
			try {
				return DtrcPendingEmailUserConfirmation::QueryArray(
					QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->EmailUser, $strEmailUser),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count DtrcPendingEmailUserConfirmations
		 * by EmailUser Index(es)
		 * @param string $strEmailUser
		 * @return int
		*/
		public static function CountByEmailUser($strEmailUser, $objOptionalClauses = null) {
			// Call DtrcPendingEmailUserConfirmation::QueryCount to perform the CountByEmailUser query
			return DtrcPendingEmailUserConfirmation::QueryCount(
				QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->EmailUser, $strEmailUser)
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
		 * Save this DtrcPendingEmailUserConfirmation
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `dtrc_pending_email_user_confirmation` (
							`ID`,
							`EmailUser`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strId) . ',
							' . $objDatabase->SqlVariable($this->strEmailUser) . '
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
							`dtrc_pending_email_user_confirmation`
						SET
							`ID` = ' . $objDatabase->SqlVariable($this->strId) . ',
							`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmailUser) . '
						WHERE
							`ID` = ' . $objDatabase->SqlVariable($this->__strId) . '
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


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this DtrcPendingEmailUserConfirmation
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DtrcPendingEmailUserConfirmation with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_pending_email_user_confirmation`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($this->strId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all DtrcPendingEmailUserConfirmations
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_pending_email_user_confirmation`');
		}

		/**
		 * Truncate dtrc_pending_email_user_confirmation table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `dtrc_pending_email_user_confirmation`');
		}

		/**
		 * Reload this DtrcPendingEmailUserConfirmation from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DtrcPendingEmailUserConfirmation object.');

			// Reload the Object
			$objReloaded = DtrcPendingEmailUserConfirmation::Load($this->strId);

			// Update $this's local variables to match
			$this->strId = $objReloaded->strId;
			$this->__strId = $this->strId;
			$this->EmailUser = $objReloaded->EmailUser;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `dtrc_pending_email_user_confirmation` (
					`ID`,
					`EmailUser`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->strId) . ',
					' . $objDatabase->SqlVariable($this->strEmailUser) . ',
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
		 * @return DtrcPendingEmailUserConfirmation[]
		 */
		public static function GetJournalForId($strId) {
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM dtrc_pending_email_user_confirmation WHERE ID = ' .
				$objDatabase->SqlVariable($strId) . ' ORDER BY __sys_date');

			return DtrcPendingEmailUserConfirmation::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return DtrcPendingEmailUserConfirmation[]
		 */
		public function GetJournal() {
			return DtrcPendingEmailUserConfirmation::GetJournalForId($this->strId);
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
					// Gets the value for strEmailUser 
					// @return string
					return $this->strEmailUser;


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailUserObject':
					// Gets the value for the DtrcUsers object referenced by strEmailUser 
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
					// Sets the value for strEmailUser 
					// @param string $mixValue
					// @return string
					try {
						$this->objEmailUserObject = null;
						return ($this->strEmailUser = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'EmailUserObject':
					// Sets the value for the DtrcUsers object referenced by strEmailUser 
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
							throw new QCallerException('Unable to set an unsaved EmailUserObject for this DtrcPendingEmailUserConfirmation');

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DtrcPendingEmailUserConfirmation"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:string"/>';
			$strToReturn .= '<element name="EmailUserObject" type="xsd1:DtrcUsers"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DtrcPendingEmailUserConfirmation', $strComplexTypeArray)) {
				$strComplexTypeArray['DtrcPendingEmailUserConfirmation'] = DtrcPendingEmailUserConfirmation::GetSoapComplexTypeXml();
				DtrcUsers::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DtrcPendingEmailUserConfirmation::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DtrcPendingEmailUserConfirmation();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->strId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'EmailUserObject')) &&
				($objSoapObject->EmailUserObject))
				$objToReturn->EmailUserObject = DtrcUsers::GetObjectFromSoapObject($objSoapObject->EmailUserObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DtrcPendingEmailUserConfirmation::GetSoapObjectFromObject($objObject, true));

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
	 */
	class QQNodeDtrcPendingEmailUserConfirmation extends QQNode {
		protected $strTableName = 'dtrc_pending_email_user_confirmation';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcPendingEmailUserConfirmation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'string', $this);
				case 'EmailUser':
					return new QQNode('EmailUser', 'EmailUser', 'string', $this);
				case 'EmailUserObject':
					return new QQNodeDtrcUsers('EmailUser', 'EmailUserObject', 'string', $this);

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
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDtrcPendingEmailUserConfirmation extends QQReverseReferenceNode {
		protected $strTableName = 'dtrc_pending_email_user_confirmation';
		protected $strPrimaryKey = 'ID';
		protected $strClassName = 'DtrcPendingEmailUserConfirmation';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('ID', 'Id', 'string', $this);
				case 'EmailUser':
					return new QQNode('EmailUser', 'EmailUser', 'string', $this);
				case 'EmailUserObject':
					return new QQNodeDtrcUsers('EmailUser', 'EmailUserObject', 'string', $this);

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