<?php
	require(__DATAGEN_CLASSES__ . '/DtrcPendingEmailUserConfirmationGen.class.php');

	/**
	 * The DtrcPendingEmailUserConfirmation class defined here contains any
	 * customized code for the DtrcPendingEmailUserConfirmation class in the
	 * Object Relational Model.  It represents the "dtrc_pending_email_user_confirmation" table 
	 * in the database, and extends from the code generated abstract DtrcPendingEmailUserConfirmationGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class DtrcPendingEmailUserConfirmation extends DtrcPendingEmailUserConfirmationGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDtrcPendingEmailUserConfirmation->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('DtrcPendingEmailUserConfirmation Object %s',  $this->strId);
		}

                
                public static function LoadFromEmailUser($strEmailUser) {
                    // Use QuerySingle to Perform the Query
                    return DtrcPendingEmailUserConfirmation::QuerySingle(
                            QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->EmailUser, $strEmailUser)
                    );
                }
                

                
                
                
                public function Save($blnForceInsert = false, $blnForceUpdate = false) {
                    $this->Id = "";
                    parent::Save($blnForceInsert, $blnForceUpdate);
                }
                
                
                
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of DtrcPendingEmailUserConfirmation objects
			return DtrcPendingEmailUserConfirmation::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DtrcPendingEmailUserConfirmation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single DtrcPendingEmailUserConfirmation object
			return DtrcPendingEmailUserConfirmation::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DtrcPendingEmailUserConfirmation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of DtrcPendingEmailUserConfirmation objects
			return DtrcPendingEmailUserConfirmation::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Param1, $strParam1),
					QQ::Equal(QQN::DtrcPendingEmailUserConfirmation()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = DtrcPendingEmailUserConfirmation::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`dtrc_pending_email_user_confirmation`.*
				FROM
					`dtrc_pending_email_user_confirmation` AS `dtrc_pending_email_user_confirmation`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DtrcPendingEmailUserConfirmation::InstantiateDbResult($objDbResult);
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