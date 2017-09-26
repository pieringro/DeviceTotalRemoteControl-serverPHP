<?php
	/**
	 * The abstract DtrcUsersGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the DtrcUsers subclass which
	 * extends this DtrcUsersGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the DtrcUsers class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property string $Email the value for strEmail (PK)
	 * @property string $Pass the value for strPass (Not Null)
	 * @property string $Lang the value for strLang 
	 * @property boolean $Inactive the value for blnInactive 
	 * @property DtrcDevices $_DtrcDevicesAsEmailUser the value for the private _objDtrcDevicesAsEmailUser (Read-Only) if set due to an expansion on the dtrc_devices.EmailUser reverse relationship
	 * @property DtrcDevices[] $_DtrcDevicesAsEmailUserArray the value for the private _objDtrcDevicesAsEmailUserArray (Read-Only) if set due to an ExpandAsArray on the dtrc_devices.EmailUser reverse relationship
	 * @property DtrcPendingEmailUserConfirmation $_DtrcPendingEmailUserConfirmationAsEmailUser the value for the private _objDtrcPendingEmailUserConfirmationAsEmailUser (Read-Only) if set due to an expansion on the dtrc_pending_email_user_confirmation.EmailUser reverse relationship
	 * @property DtrcPendingEmailUserConfirmation[] $_DtrcPendingEmailUserConfirmationAsEmailUserArray the value for the private _objDtrcPendingEmailUserConfirmationAsEmailUserArray (Read-Only) if set due to an ExpandAsArray on the dtrc_pending_email_user_confirmation.EmailUser reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class DtrcUsersGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column dtrc_users.Email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 64;
		const EmailDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strEmail;
		 */
		protected $__strEmail;

		/**
		 * Protected member variable that maps to the database column dtrc_users.Pass
		 * @var string strPass
		 */
		protected $strPass;
		const PassMaxLength = 64;
		const PassDefault = null;


		/**
		 * Protected member variable that maps to the database column dtrc_users.Lang
		 * @var string strLang
		 */
		protected $strLang;
		const LangMaxLength = 64;
		const LangDefault = null;


		/**
		 * Protected member variable that maps to the database column dtrc_users.Inactive
		 * @var boolean blnInactive
		 */
		protected $blnInactive;
		const InactiveDefault = null;


		/**
		 * Private member variable that stores a reference to a single DtrcDevicesAsEmailUser object
		 * (of type DtrcDevices), if this DtrcUsers object was restored with
		 * an expansion on the dtrc_devices association table.
		 * @var DtrcDevices _objDtrcDevicesAsEmailUser;
		 */
		private $_objDtrcDevicesAsEmailUser;

		/**
		 * Private member variable that stores a reference to an array of DtrcDevicesAsEmailUser objects
		 * (of type DtrcDevices[]), if this DtrcUsers object was restored with
		 * an ExpandAsArray on the dtrc_devices association table.
		 * @var DtrcDevices[] _objDtrcDevicesAsEmailUserArray;
		 */
		private $_objDtrcDevicesAsEmailUserArray = array();

		/**
		 * Private member variable that stores a reference to a single DtrcPendingEmailUserConfirmationAsEmailUser object
		 * (of type DtrcPendingEmailUserConfirmation), if this DtrcUsers object was restored with
		 * an expansion on the dtrc_pending_email_user_confirmation association table.
		 * @var DtrcPendingEmailUserConfirmation _objDtrcPendingEmailUserConfirmationAsEmailUser;
		 */
		private $_objDtrcPendingEmailUserConfirmationAsEmailUser;

		/**
		 * Private member variable that stores a reference to an array of DtrcPendingEmailUserConfirmationAsEmailUser objects
		 * (of type DtrcPendingEmailUserConfirmation[]), if this DtrcUsers object was restored with
		 * an ExpandAsArray on the dtrc_pending_email_user_confirmation association table.
		 * @var DtrcPendingEmailUserConfirmation[] _objDtrcPendingEmailUserConfirmationAsEmailUserArray;
		 */
		private $_objDtrcPendingEmailUserConfirmationAsEmailUserArray = array();

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
		 * Load a DtrcUsers from PK Info
		 * @param string $strEmail
		 * @return DtrcUsers
		 */
		public static function Load($strEmail) {
			// Use QuerySingle to Perform the Query
			return DtrcUsers::QuerySingle(
				QQ::Equal(QQN::DtrcUsers()->Email, $strEmail)
			);
		}

		/**
		 * Load all DtrcUserses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcUsers[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call DtrcUsers::QueryArray to perform the LoadAll query
			try {
				return DtrcUsers::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all DtrcUserses
		 * @return int
		 */
		public static function CountAll() {
			// Call DtrcUsers::QueryCount to perform the CountAll query
			return DtrcUsers::QueryCount(QQ::All());
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
			$objDatabase = DtrcUsers::GetDatabase();

			// Create/Build out the QueryBuilder object with DtrcUsers-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'dtrc_users');
			DtrcUsers::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('dtrc_users');

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
		 * Static Qcodo Query method to query for a single DtrcUsers object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcUsers the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcUsers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new DtrcUsers object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = DtrcUsers::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return DtrcUsers::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of DtrcUsers objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return DtrcUsers[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcUsers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return DtrcUsers::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = DtrcUsers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of DtrcUsers objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = DtrcUsers::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = DtrcUsers::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'dtrc_users_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with DtrcUsers-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				DtrcUsers::GetSelectFields($objQueryBuilder);
				DtrcUsers::GetFromFields($objQueryBuilder);

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
			return DtrcUsers::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this DtrcUsers
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'dtrc_users';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'Email', $strAliasPrefix . 'Email');
			$objBuilder->AddSelectItem($strTableName, 'Pass', $strAliasPrefix . 'Pass');
			$objBuilder->AddSelectItem($strTableName, 'Lang', $strAliasPrefix . 'Lang');
			$objBuilder->AddSelectItem($strTableName, 'Inactive', $strAliasPrefix . 'Inactive');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a DtrcUsers from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this DtrcUsers::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return DtrcUsers
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'Email';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->strEmail == $objDbRow->GetColumn($strAliasName, 'VarChar'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'dtrc_users__';


				$strAlias = $strAliasPrefix . 'dtrcdevicesasemailuser__ID';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDtrcDevicesAsEmailUserArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDtrcDevicesAsEmailUserArray[$intPreviousChildItemCount - 1];
						$objChildItem = DtrcDevices::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcdevicesasemailuser__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objDtrcDevicesAsEmailUserArray[] = $objChildItem;
					} else
						$objPreviousItem->_objDtrcDevicesAsEmailUserArray[] = DtrcDevices::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcdevicesasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__ID';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objDtrcPendingEmailUserConfirmationAsEmailUserArray)) {
						$objPreviousChildItem = $objPreviousItem->_objDtrcPendingEmailUserConfirmationAsEmailUserArray[$intPreviousChildItemCount - 1];
						$objChildItem = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objDtrcPendingEmailUserConfirmationAsEmailUserArray[] = $objChildItem;
					} else
						$objPreviousItem->_objDtrcPendingEmailUserConfirmationAsEmailUserArray[] = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'dtrc_users__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the DtrcUsers object
			$objToReturn = new DtrcUsers();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'Email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Email'] : $strAliasPrefix . 'Email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Pass', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Pass'] : $strAliasPrefix . 'Pass';
			$objToReturn->strPass = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Lang', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Lang'] : $strAliasPrefix . 'Lang';
			$objToReturn->strLang = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Inactive', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Inactive'] : $strAliasPrefix . 'Inactive';
			$objToReturn->blnInactive = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'dtrc_users__';




			// Check for DtrcDevicesAsEmailUser Virtual Binding
			$strAlias = $strAliasPrefix . 'dtrcdevicesasemailuser__ID';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDtrcDevicesAsEmailUserArray[] = DtrcDevices::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcdevicesasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDtrcDevicesAsEmailUser = DtrcDevices::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcdevicesasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for DtrcPendingEmailUserConfirmationAsEmailUser Virtual Binding
			$strAlias = $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__ID';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objDtrcPendingEmailUserConfirmationAsEmailUserArray[] = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objDtrcPendingEmailUserConfirmationAsEmailUser = DtrcPendingEmailUserConfirmation::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dtrcpendingemailuserconfirmationasemailuser__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of DtrcUserses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return DtrcUsers[]
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
					$objItem = DtrcUsers::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = DtrcUsers::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single DtrcUsers object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return DtrcUsers next row resulting from the query
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
			return DtrcUsers::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single DtrcUsers object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @return DtrcUsers
		*/
		public static function LoadByEmail($strEmail, $objOptionalClauses = null) {
			return DtrcUsers::QuerySingle(
				QQ::Equal(QQN::DtrcUsers()->Email, $strEmail)
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
		 * Save this DtrcUsers
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `dtrc_users` (
							`Email`,
							`Pass`,
							`Lang`,
							`Inactive`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->strPass) . ',
							' . $objDatabase->SqlVariable($this->strLang) . ',
							' . $objDatabase->SqlVariable($this->blnInactive) . '
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
							`dtrc_users`
						SET
							`Email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`Pass` = ' . $objDatabase->SqlVariable($this->strPass) . ',
							`Lang` = ' . $objDatabase->SqlVariable($this->strLang) . ',
							`Inactive` = ' . $objDatabase->SqlVariable($this->blnInactive) . '
						WHERE
							`Email` = ' . $objDatabase->SqlVariable($this->__strEmail) . '
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
			$this->__strEmail = $this->strEmail;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this DtrcUsers
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this DtrcUsers with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_users`
				WHERE
					`Email` = ' . $objDatabase->SqlVariable($this->strEmail) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all DtrcUserses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_users`');
		}

		/**
		 * Truncate dtrc_users table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `dtrc_users`');
		}

		/**
		 * Reload this DtrcUsers from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved DtrcUsers object.');

			// Reload the Object
			$objReloaded = DtrcUsers::Load($this->strEmail);

			// Update $this's local variables to match
			$this->strEmail = $objReloaded->strEmail;
			$this->__strEmail = $this->strEmail;
			$this->strPass = $objReloaded->strPass;
			$this->strLang = $objReloaded->strLang;
			$this->blnInactive = $objReloaded->blnInactive;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = DtrcUsers::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `dtrc_users` (
					`Email`,
					`Pass`,
					`Lang`,
					`Inactive`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->strPass) . ',
					' . $objDatabase->SqlVariable($this->strLang) . ',
					' . $objDatabase->SqlVariable($this->blnInactive) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer strEmail
		 * @return DtrcUsers[]
		 */
		public static function GetJournalForId($strEmail) {
			$objDatabase = DtrcUsers::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM dtrc_users WHERE Email = ' .
				$objDatabase->SqlVariable($strEmail) . ' ORDER BY __sys_date');

			return DtrcUsers::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return DtrcUsers[]
		 */
		public function GetJournal() {
			return DtrcUsers::GetJournalForId($this->strEmail);
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
				case 'Email':
					// Gets the value for strEmail (PK)
					// @return string
					return $this->strEmail;

				case 'Pass':
					// Gets the value for strPass (Not Null)
					// @return string
					return $this->strPass;

				case 'Lang':
					// Gets the value for strLang 
					// @return string
					return $this->strLang;

				case 'Inactive':
					// Gets the value for blnInactive 
					// @return boolean
					return $this->blnInactive;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_DtrcDevicesAsEmailUser':
					// Gets the value for the private _objDtrcDevicesAsEmailUser (Read-Only)
					// if set due to an expansion on the dtrc_devices.EmailUser reverse relationship
					// @return DtrcDevices
					return $this->_objDtrcDevicesAsEmailUser;

				case '_DtrcDevicesAsEmailUserArray':
					// Gets the value for the private _objDtrcDevicesAsEmailUserArray (Read-Only)
					// if set due to an ExpandAsArray on the dtrc_devices.EmailUser reverse relationship
					// @return DtrcDevices[]
					return (array) $this->_objDtrcDevicesAsEmailUserArray;

				case '_DtrcPendingEmailUserConfirmationAsEmailUser':
					// Gets the value for the private _objDtrcPendingEmailUserConfirmationAsEmailUser (Read-Only)
					// if set due to an expansion on the dtrc_pending_email_user_confirmation.EmailUser reverse relationship
					// @return DtrcPendingEmailUserConfirmation
					return $this->_objDtrcPendingEmailUserConfirmationAsEmailUser;

				case '_DtrcPendingEmailUserConfirmationAsEmailUserArray':
					// Gets the value for the private _objDtrcPendingEmailUserConfirmationAsEmailUserArray (Read-Only)
					// if set due to an ExpandAsArray on the dtrc_pending_email_user_confirmation.EmailUser reverse relationship
					// @return DtrcPendingEmailUserConfirmation[]
					return (array) $this->_objDtrcPendingEmailUserConfirmationAsEmailUserArray;


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
				case 'Email':
					// Sets the value for strEmail (PK)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Pass':
					// Sets the value for strPass (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPass = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Lang':
					// Sets the value for strLang 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLang = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Inactive':
					// Sets the value for blnInactive 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInactive = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for DtrcDevicesAsEmailUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DtrcDevicesesAsEmailUser as an array of DtrcDevices objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcDevices[]
		*/ 
		public function GetDtrcDevicesAsEmailUserArray($objOptionalClauses = null) {
			if ((is_null($this->strEmail)))
				return array();

			try {
				return DtrcDevices::LoadArrayByEmailUser($this->strEmail, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DtrcDevicesesAsEmailUser
		 * @return int
		*/ 
		public function CountDtrcDevicesesAsEmailUser() {
			if ((is_null($this->strEmail)))
				return 0;

			return DtrcDevices::CountByEmailUser($this->strEmail);
		}

		/**
		 * Associates a DtrcDevicesAsEmailUser
		 * @param DtrcDevices $objDtrcDevices
		 * @return void
		*/ 
		public function AssociateDtrcDevicesAsEmailUser(DtrcDevices $objDtrcDevices) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcDevicesAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcDevices->Id)) || (is_null($objDtrcDevices->EmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcDevicesAsEmailUser on this DtrcUsers with an unsaved DtrcDevices.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_devices`
				SET
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcDevices->Id) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($objDtrcDevices->EmailUser) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objDtrcDevices->EmailUser = $this->strEmail;
				$objDtrcDevices->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a DtrcDevicesAsEmailUser
		 * @param DtrcDevices $objDtrcDevices
		 * @return void
		*/ 
		public function UnassociateDtrcDevicesAsEmailUser(DtrcDevices $objDtrcDevices) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcDevices->Id)) || (is_null($objDtrcDevices->EmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this DtrcUsers with an unsaved DtrcDevices.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_devices`
				SET
					`EmailUser` = null
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcDevices->Id) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($objDtrcDevices->EmailUser) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcDevices->EmailUser = null;
				$objDtrcDevices->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all DtrcDevicesesAsEmailUser
		 * @return void
		*/ 
		public function UnassociateAllDtrcDevicesesAsEmailUser() {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this unsaved DtrcUsers.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcDevices::LoadArrayByEmailUser($this->strEmail) as $objDtrcDevices) {
					$objDtrcDevices->EmailUser = null;
					$objDtrcDevices->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_devices`
				SET
					`EmailUser` = null
				WHERE
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');
		}

		/**
		 * Deletes an associated DtrcDevicesAsEmailUser
		 * @param DtrcDevices $objDtrcDevices
		 * @return void
		*/ 
		public function DeleteAssociatedDtrcDevicesAsEmailUser(DtrcDevices $objDtrcDevices) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcDevices->Id)) || (is_null($objDtrcDevices->EmailUser)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this DtrcUsers with an unsaved DtrcDevices.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_devices`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcDevices->Id) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($objDtrcDevices->EmailUser) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcDevices->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated DtrcDevicesesAsEmailUser
		 * @return void
		*/ 
		public function DeleteAllDtrcDevicesesAsEmailUser() {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcDevicesAsEmailUser on this unsaved DtrcUsers.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcDevices::LoadArrayByEmailUser($this->strEmail) as $objDtrcDevices) {
					$objDtrcDevices->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_devices`
				WHERE
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');
		}

			
		
		// Related Objects' Methods for DtrcPendingEmailUserConfirmationAsEmailUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DtrcPendingEmailUserConfirmationsAsEmailUser as an array of DtrcPendingEmailUserConfirmation objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DtrcPendingEmailUserConfirmation[]
		*/ 
		public function GetDtrcPendingEmailUserConfirmationAsEmailUserArray($objOptionalClauses = null) {
			if ((is_null($this->strEmail)))
				return array();

			try {
				return DtrcPendingEmailUserConfirmation::LoadArrayByEmailUser($this->strEmail, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DtrcPendingEmailUserConfirmationsAsEmailUser
		 * @return int
		*/ 
		public function CountDtrcPendingEmailUserConfirmationsAsEmailUser() {
			if ((is_null($this->strEmail)))
				return 0;

			return DtrcPendingEmailUserConfirmation::CountByEmailUser($this->strEmail);
		}

		/**
		 * Associates a DtrcPendingEmailUserConfirmationAsEmailUser
		 * @param DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation
		 * @return void
		*/ 
		public function AssociateDtrcPendingEmailUserConfirmationAsEmailUser(DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcPendingEmailUserConfirmationAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcPendingEmailUserConfirmation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDtrcPendingEmailUserConfirmationAsEmailUser on this DtrcUsers with an unsaved DtrcPendingEmailUserConfirmation.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_pending_email_user_confirmation`
				SET
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcPendingEmailUserConfirmation->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objDtrcPendingEmailUserConfirmation->EmailUser = $this->strEmail;
				$objDtrcPendingEmailUserConfirmation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a DtrcPendingEmailUserConfirmationAsEmailUser
		 * @param DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation
		 * @return void
		*/ 
		public function UnassociateDtrcPendingEmailUserConfirmationAsEmailUser(DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcPendingEmailUserConfirmation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this DtrcUsers with an unsaved DtrcPendingEmailUserConfirmation.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_pending_email_user_confirmation`
				SET
					`EmailUser` = null
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcPendingEmailUserConfirmation->Id) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcPendingEmailUserConfirmation->EmailUser = null;
				$objDtrcPendingEmailUserConfirmation->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all DtrcPendingEmailUserConfirmationsAsEmailUser
		 * @return void
		*/ 
		public function UnassociateAllDtrcPendingEmailUserConfirmationsAsEmailUser() {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this unsaved DtrcUsers.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcPendingEmailUserConfirmation::LoadArrayByEmailUser($this->strEmail) as $objDtrcPendingEmailUserConfirmation) {
					$objDtrcPendingEmailUserConfirmation->EmailUser = null;
					$objDtrcPendingEmailUserConfirmation->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dtrc_pending_email_user_confirmation`
				SET
					`EmailUser` = null
				WHERE
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');
		}

		/**
		 * Deletes an associated DtrcPendingEmailUserConfirmationAsEmailUser
		 * @param DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation
		 * @return void
		*/ 
		public function DeleteAssociatedDtrcPendingEmailUserConfirmationAsEmailUser(DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation) {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this unsaved DtrcUsers.');
			if ((is_null($objDtrcPendingEmailUserConfirmation->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this DtrcUsers with an unsaved DtrcPendingEmailUserConfirmation.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_pending_email_user_confirmation`
				WHERE
					`ID` = ' . $objDatabase->SqlVariable($objDtrcPendingEmailUserConfirmation->Id) . ' AND
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objDtrcPendingEmailUserConfirmation->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated DtrcPendingEmailUserConfirmationsAsEmailUser
		 * @return void
		*/ 
		public function DeleteAllDtrcPendingEmailUserConfirmationsAsEmailUser() {
			if ((is_null($this->strEmail)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDtrcPendingEmailUserConfirmationAsEmailUser on this unsaved DtrcUsers.');

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (DtrcPendingEmailUserConfirmation::LoadArrayByEmailUser($this->strEmail) as $objDtrcPendingEmailUserConfirmation) {
					$objDtrcPendingEmailUserConfirmation->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dtrc_pending_email_user_confirmation`
				WHERE
					`EmailUser` = ' . $objDatabase->SqlVariable($this->strEmail) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="DtrcUsers"><sequence>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Pass" type="xsd:string"/>';
			$strToReturn .= '<element name="Lang" type="xsd:string"/>';
			$strToReturn .= '<element name="Inactive" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('DtrcUsers', $strComplexTypeArray)) {
				$strComplexTypeArray['DtrcUsers'] = DtrcUsers::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, DtrcUsers::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new DtrcUsers();
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Pass'))
				$objToReturn->strPass = $objSoapObject->Pass;
			if (property_exists($objSoapObject, 'Lang'))
				$objToReturn->strLang = $objSoapObject->Lang;
			if (property_exists($objSoapObject, 'Inactive'))
				$objToReturn->blnInactive = $objSoapObject->Inactive;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, DtrcUsers::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Email
	 * @property-read QQNode $Pass
	 * @property-read QQNode $Lang
	 * @property-read QQNode $Inactive
	 * @property-read QQReverseReferenceNodeDtrcDevices $DtrcDevicesAsEmailUser
	 * @property-read QQReverseReferenceNodeDtrcPendingEmailUserConfirmation $DtrcPendingEmailUserConfirmationAsEmailUser
	 */
	class QQNodeDtrcUsers extends QQNode {
		protected $strTableName = 'dtrc_users';
		protected $strPrimaryKey = 'Email';
		protected $strClassName = 'DtrcUsers';
		public function __get($strName) {
			switch ($strName) {
				case 'Email':
					return new QQNode('Email', 'Email', 'string', $this);
				case 'Pass':
					return new QQNode('Pass', 'Pass', 'string', $this);
				case 'Lang':
					return new QQNode('Lang', 'Lang', 'string', $this);
				case 'Inactive':
					return new QQNode('Inactive', 'Inactive', 'boolean', $this);
				case 'DtrcDevicesAsEmailUser':
					return new QQReverseReferenceNodeDtrcDevices($this, 'dtrcdevicesasemailuser', 'reverse_reference', 'EmailUser');
				case 'DtrcPendingEmailUserConfirmationAsEmailUser':
					return new QQReverseReferenceNodeDtrcPendingEmailUserConfirmation($this, 'dtrcpendingemailuserconfirmationasemailuser', 'reverse_reference', 'EmailUser');

				case '_PrimaryKeyNode':
					return new QQNode('Email', 'Email', 'string', $this);
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
	 * @property-read QQNode $Email
	 * @property-read QQNode $Pass
	 * @property-read QQNode $Lang
	 * @property-read QQNode $Inactive
	 * @property-read QQReverseReferenceNodeDtrcDevices $DtrcDevicesAsEmailUser
	 * @property-read QQReverseReferenceNodeDtrcPendingEmailUserConfirmation $DtrcPendingEmailUserConfirmationAsEmailUser
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeDtrcUsers extends QQReverseReferenceNode {
		protected $strTableName = 'dtrc_users';
		protected $strPrimaryKey = 'Email';
		protected $strClassName = 'DtrcUsers';
		public function __get($strName) {
			switch ($strName) {
				case 'Email':
					return new QQNode('Email', 'Email', 'string', $this);
				case 'Pass':
					return new QQNode('Pass', 'Pass', 'string', $this);
				case 'Lang':
					return new QQNode('Lang', 'Lang', 'string', $this);
				case 'Inactive':
					return new QQNode('Inactive', 'Inactive', 'boolean', $this);
				case 'DtrcDevicesAsEmailUser':
					return new QQReverseReferenceNodeDtrcDevices($this, 'dtrcdevicesasemailuser', 'reverse_reference', 'EmailUser');
				case 'DtrcPendingEmailUserConfirmationAsEmailUser':
					return new QQReverseReferenceNodeDtrcPendingEmailUserConfirmation($this, 'dtrcpendingemailuserconfirmationasemailuser', 'reverse_reference', 'EmailUser');

				case '_PrimaryKeyNode':
					return new QQNode('Email', 'Email', 'string', $this);
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