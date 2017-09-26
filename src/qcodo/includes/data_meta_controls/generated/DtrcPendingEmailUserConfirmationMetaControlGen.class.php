<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DtrcPendingEmailUserConfirmation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DtrcPendingEmailUserConfirmation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DtrcPendingEmailUserConfirmationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DtrcPendingEmailUserConfirmation $DtrcPendingEmailUserConfirmation the actual DtrcPendingEmailUserConfirmation data class being edited
	 * property QTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailUserControl
	 * property-read QLabel $EmailUserLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DtrcPendingEmailUserConfirmationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DtrcPendingEmailUserConfirmation objDtrcPendingEmailUserConfirmation
		 * @access protected
		 */
		protected $objDtrcPendingEmailUserConfirmation;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of DtrcPendingEmailUserConfirmation's individual data fields
        /**
         * @var QTextBox txtId;
         * @access protected
         */
		protected $txtId;

        /**
         * @var QListBox lstEmailUserObject;
         * @access protected
         */
		protected $lstEmailUserObject;


		// Controls that allow the viewing of DtrcPendingEmailUserConfirmation's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

        /**
         * @var QLabel lblEmailUser
         * @access protected
         */
		protected $lblEmailUser;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DtrcPendingEmailUserConfirmationMetaControl to edit a single DtrcPendingEmailUserConfirmation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DtrcPendingEmailUserConfirmation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcPendingEmailUserConfirmationMetaControl
		 * @param DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation new or existing DtrcPendingEmailUserConfirmation object
		 */
		 public function __construct($objParentObject, DtrcPendingEmailUserConfirmation $objDtrcPendingEmailUserConfirmation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DtrcPendingEmailUserConfirmationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DtrcPendingEmailUserConfirmation object
			$this->objDtrcPendingEmailUserConfirmation = $objDtrcPendingEmailUserConfirmation;

			// Figure out if we're Editing or Creating New
			if ($this->objDtrcPendingEmailUserConfirmation->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcPendingEmailUserConfirmationMetaControl
		 * @param string $strId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcPendingEmailUserConfirmation object creation - defaults to CreateOrEdit
 		 * @return DtrcPendingEmailUserConfirmationMetaControl
		 */
		public static function Create($objParentObject, $strId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($strId)) {
				$objDtrcPendingEmailUserConfirmation = DtrcPendingEmailUserConfirmation::Load($strId);

				// DtrcPendingEmailUserConfirmation was found -- return it!
				if ($objDtrcPendingEmailUserConfirmation)
					return new DtrcPendingEmailUserConfirmationMetaControl($objParentObject, $objDtrcPendingEmailUserConfirmation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DtrcPendingEmailUserConfirmation object with PK arguments: ' . $strId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DtrcPendingEmailUserConfirmationMetaControl($objParentObject, new DtrcPendingEmailUserConfirmation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcPendingEmailUserConfirmationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcPendingEmailUserConfirmation object creation - defaults to CreateOrEdit
		 * @return DtrcPendingEmailUserConfirmationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::PathInfo(0);
			return DtrcPendingEmailUserConfirmationMetaControl::Create($objParentObject, $strId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcPendingEmailUserConfirmationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcPendingEmailUserConfirmation object creation - defaults to CreateOrEdit
		 * @return DtrcPendingEmailUserConfirmationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::QueryString('strId');
			return DtrcPendingEmailUserConfirmationMetaControl::Create($objParentObject, $strId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Text = $this->objDtrcPendingEmailUserConfirmation->Id;
			$this->txtId->Required = true;
			$this->txtId->MaxLength = DtrcPendingEmailUserConfirmation::IdMaxLength;
			return $this->txtId;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->Text = $this->objDtrcPendingEmailUserConfirmation->Id;
			$this->lblId->Required = true;
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstEmailUserObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstEmailUserObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstEmailUserObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstEmailUserObject->Name = QApplication::Translate('Email User Object');
			$this->lstEmailUserObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objEmailUserObjectCursor = DtrcUsers::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objEmailUserObject = DtrcUsers::InstantiateCursor($objEmailUserObjectCursor)) {
				$objListItem = new QListItem($objEmailUserObject->__toString(), $objEmailUserObject->Email);
				if (($this->objDtrcPendingEmailUserConfirmation->EmailUserObject) && ($this->objDtrcPendingEmailUserConfirmation->EmailUserObject->Email == $objEmailUserObject->Email))
					$objListItem->Selected = true;
				$this->lstEmailUserObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstEmailUserObject;
		}

		/**
		 * Create and setup QLabel lblEmailUser
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmailUser_Create($strControlId = null) {
			$this->lblEmailUser = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmailUser->Name = QApplication::Translate('Email User Object');
			$this->lblEmailUser->Text = ($this->objDtrcPendingEmailUserConfirmation->EmailUserObject) ? $this->objDtrcPendingEmailUserConfirmation->EmailUserObject->__toString() : null;
			return $this->lblEmailUser;
		}



		/**
		 * Refresh this MetaControl with Data from the local DtrcPendingEmailUserConfirmation object.
		 * @param boolean $blnReload reload DtrcPendingEmailUserConfirmation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDtrcPendingEmailUserConfirmation->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objDtrcPendingEmailUserConfirmation->Id;
			if ($this->lblId) $this->lblId->Text = $this->objDtrcPendingEmailUserConfirmation->Id;

			if ($this->lstEmailUserObject) {
					$this->lstEmailUserObject->RemoveAllItems();
				$this->lstEmailUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objEmailUserObjectArray = DtrcUsers::LoadAll();
				if ($objEmailUserObjectArray) foreach ($objEmailUserObjectArray as $objEmailUserObject) {
					$objListItem = new QListItem($objEmailUserObject->__toString(), $objEmailUserObject->Email);
					if (($this->objDtrcPendingEmailUserConfirmation->EmailUserObject) && ($this->objDtrcPendingEmailUserConfirmation->EmailUserObject->Email == $objEmailUserObject->Email))
						$objListItem->Selected = true;
					$this->lstEmailUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblEmailUser) $this->lblEmailUser->Text = ($this->objDtrcPendingEmailUserConfirmation->EmailUserObject) ? $this->objDtrcPendingEmailUserConfirmation->EmailUserObject->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DTRCPENDINGEMAILUSERCONFIRMATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DtrcPendingEmailUserConfirmation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDtrcPendingEmailUserConfirmation() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objDtrcPendingEmailUserConfirmation->Id = $this->txtId->Text;
				if ($this->lstEmailUserObject) $this->objDtrcPendingEmailUserConfirmation->EmailUser = $this->lstEmailUserObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DtrcPendingEmailUserConfirmation object
				$this->objDtrcPendingEmailUserConfirmation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DtrcPendingEmailUserConfirmation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDtrcPendingEmailUserConfirmation() {
			$this->objDtrcPendingEmailUserConfirmation->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'DtrcPendingEmailUserConfirmation': return $this->objDtrcPendingEmailUserConfirmation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DtrcPendingEmailUserConfirmation fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'EmailUserControl':
					if (!$this->lstEmailUserObject) return $this->lstEmailUserObject_Create();
					return $this->lstEmailUserObject;
				case 'EmailUserLabel':
					if (!$this->lblEmailUser) return $this->lblEmailUser_Create();
					return $this->lblEmailUser;
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
			try {
				switch ($strName) {
					// Controls that point to DtrcPendingEmailUserConfirmation fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'EmailUserControl':
						return ($this->lstEmailUserObject = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>