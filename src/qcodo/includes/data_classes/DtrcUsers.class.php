<?php
	require(__DATAGEN_CLASSES__ . '/DtrcUsersGen.class.php');

	/**
	 * The DtrcUsers class defined here contains any
	 * customized code for the DtrcUsers class in the
	 * Object Relational Model.  It represents the "dtrc_users" table 
	 * in the database, and extends from the code generated abstract DtrcUsersGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class DtrcUsers extends DtrcUsersGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objDtrcUsers->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('DtrcUsers Object %s',  $this->strEmail);
		}
                
                
                public static function LoadInTO($strEmail) {
                    $result = parent::Load($strEmail);
                    if(isset($result)){
                        $userTo = new UserTO();
                        $userTo->email = $result->Email;
                        $userTo->pass = $result->Pass;
                        $userTo->inactive = $result->Inactive;
                        return $userTo;
                    }
                    return false;
                }
                
                public static function ActiveUser($strEmail){
                    $dtrcUser = parent::Load($strEmail);
                    $dtrcUser->ActiveThisUser();
                    try{
                        $result = $dtrcUser->Save();
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
                    return $result;
                }
                
                
                public function InitDataWithTO($userTO){
                    if($userTO instanceof UserTO){
                        $this->Email = $userTO->email;
                        $this->Pass = $userTO->pass;
                        $this->Lang = $userTO->lang;
                        $this->Inactive = 1;
                    }
                }
                
                /**
                 * Da chiamare prima di salvare un utente per attivarlo
                 */
                public function ActiveThisUser(){
                    $this->Inactive = 0;
                }
                
                public function Save($blnForceInsert = false, $blnForceUpdate = false) {
                    //check if exists a Device with the same id
                    $otherUserTO = DtrcUsers::LoadInTO($this->strEmail);
                    
                    if (isset($otherUserTO) && $otherUserTO instanceof DtrcUsers &&
                            $otherUserTO->email == $this->strEmail) {
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
                        $resultParent = parent::Save($blnForceInsert, $blnForceUpdate);
                        if($resultParent == null){
                            return true;
                        }
                    }
                }
                
                
                
                
                private function Update() {
                    // Get the Database Object for this Class
                    $objDatabase = DtrcUsers::GetDatabase();
                    $mixToReturn = null;

                    try {
                        // Perform an UPDATE query
                        // First checking for Optimistic Locking constraints (if applicable)

                        if (!isset($this->__strEmail)) {
                            $this->__strEmail = $this->strEmail;
                        }

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
                        if ($objDatabase->JournalingDatabase)
                            $this->Journal('UPDATE');
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
                
                
                

		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of DtrcUsers objects
			return DtrcUsers::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcUsers()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DtrcUsers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single DtrcUsers object
			return DtrcUsers::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcUsers()->Param1, $strParam1),
					QQ::GreaterThan(QQN::DtrcUsers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of DtrcUsers objects
			return DtrcUsers::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::DtrcUsers()->Param1, $strParam1),
					QQ::Equal(QQN::DtrcUsers()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = DtrcUsers::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`dtrc_users`.*
				FROM
					`dtrc_users` AS `dtrc_users`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return DtrcUsers::InstantiateDbResult($objDbResult);
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

