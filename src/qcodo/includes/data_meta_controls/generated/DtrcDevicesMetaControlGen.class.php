<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DtrcDevices class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DtrcDevices object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DtrcDevicesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DtrcDevices $DtrcDevices the actual DtrcDevices data class being edited
	 * property QTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $EmailUserControl
	 * property-read QLabel $EmailUserLabel
	 * property QTextBox $TokenFirebaseControl
	 * property-read QLabel $TokenFirebaseLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DtrcDevicesMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DtrcDevices objDtrcDevices
		 * @access protected
		 */
		protected $objDtrcDevices;

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

		// Controls that allow the editing of DtrcDevices's individual data fields
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

        /**
         * @var QTextBox txtTokenFirebase;
         * @access protected
         */
		protected $txtTokenFirebase;


		// Controls that allow the viewing of DtrcDevices's individual data fields
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

        /**
         * @var QLabel lblTokenFirebase
         * @access protected
         */
		protected $lblTokenFirebase;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DtrcDevicesMetaControl to edit a single DtrcDevices object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DtrcDevices object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcDevicesMetaControl
		 * @param DtrcDevices $objDtrcDevices new or existing DtrcDevices object
		 */
		 public function __construct($objParentObject, DtrcDevices $objDtrcDevices) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DtrcDevicesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DtrcDevices object
			$this->objDtrcDevices = $objDtrcDevices;

			// Figure out if we're Editing or Creating New
			if ($this->objDtrcDevices->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcDevicesMetaControl
		 * @param string $strId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcDevices object creation - defaults to CreateOrEdit
 		 * @return DtrcDevicesMetaControl
		 */
		public static function Create($objParentObject, $strId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($strId)) {
				$objDtrcDevices = DtrcDevices::Load($strId);

				// DtrcDevices was found -- return it!
				if ($objDtrcDevices)
					return new DtrcDevicesMetaControl($objParentObject, $objDtrcDevices);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DtrcDevices object with PK arguments: ' . $strId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DtrcDevicesMetaControl($objParentObject, new DtrcDevices());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcDevicesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcDevices object creation - defaults to CreateOrEdit
		 * @return DtrcDevicesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::PathInfo(0);
			return DtrcDevicesMetaControl::Create($objParentObject, $strId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcDevicesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcDevices object creation - defaults to CreateOrEdit
		 * @return DtrcDevicesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::QueryString('strId');
			return DtrcDevicesMetaControl::Create($objParentObject, $strId, $intCreateType);
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
			$this->txtId->Text = $this->objDtrcDevices->Id;
			$this->txtId->Required = true;
			$this->txtId->MaxLength = DtrcDevices::IdMaxLength;
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
			$this->lblId->Text = $this->objDtrcDevices->Id;
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
			$this->lstEmailUserObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstEmailUserObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objEmailUserObjectCursor = DtrcUsers::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objEmailUserObject = DtrcUsers::InstantiateCursor($objEmailUserObjectCursor)) {
				$objListItem = new QListItem($objEmailUserObject->__toString(), $objEmailUserObject->Email);
				if (($this->objDtrcDevices->EmailUserObject) && ($this->objDtrcDevices->EmailUserObject->Email == $objEmailUserObject->Email))
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
			$this->lblEmailUser->Text = ($this->objDtrcDevices->EmailUserObject) ? $this->objDtrcDevices->EmailUserObject->__toString() : null;
			$this->lblEmailUser->Required = true;
			return $this->lblEmailUser;
		}

		/**
		 * Create and setup QTextBox txtTokenFirebase
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTokenFirebase_Create($strControlId = null) {
			$this->txtTokenFirebase = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTokenFirebase->Name = QApplication::Translate('Token Firebase');
			$this->txtTokenFirebase->Text = $this->objDtrcDevices->TokenFirebase;
			$this->txtTokenFirebase->MaxLength = DtrcDevices::TokenFirebaseMaxLength;
			return $this->txtTokenFirebase;
		}

		/**
		 * Create and setup QLabel lblTokenFirebase
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTokenFirebase_Create($strControlId = null) {
			$this->lblTokenFirebase = new QLabel($this->objParentObject, $strControlId);
			$this->lblTokenFirebase->Name = QApplication::Translate('Token Firebase');
			$this->lblTokenFirebase->Text = $this->objDtrcDevices->TokenFirebase;
			return $this->lblTokenFirebase;
		}



		/**
		 * Refresh this MetaControl with Data from the local DtrcDevices object.
		 * @param boolean $blnReload reload DtrcDevices from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDtrcDevices->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objDtrcDevices->Id;
			if ($this->lblId) $this->lblId->Text = $this->objDtrcDevices->Id;

			if ($this->lstEmailUserObject) {
					$this->lstEmailUserObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstEmailUserObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objEmailUserObjectArray = DtrcUsers::LoadAll();
				if ($objEmailUserObjectArray) foreach ($objEmailUserObjectArray as $objEmailUserObject) {
					$objListItem = new QListItem($objEmailUserObject->__toString(), $objEmailUserObject->Email);
					if (($this->objDtrcDevices->EmailUserObject) && ($this->objDtrcDevices->EmailUserObject->Email == $objEmailUserObject->Email))
						$objListItem->Selected = true;
					$this->lstEmailUserObject->AddItem($objListItem);
				}
			}
			if ($this->lblEmailUser) $this->lblEmailUser->Text = ($this->objDtrcDevices->EmailUserObject) ? $this->objDtrcDevices->EmailUserObject->__toString() : null;

			if ($this->txtTokenFirebase) $this->txtTokenFirebase->Text = $this->objDtrcDevices->TokenFirebase;
			if ($this->lblTokenFirebase) $this->lblTokenFirebase->Text = $this->objDtrcDevices->TokenFirebase;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DTRCDEVICES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DtrcDevices instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDtrcDevices() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objDtrcDevices->Id = $this->txtId->Text;
				if ($this->lstEmailUserObject) $this->objDtrcDevices->EmailUser = $this->lstEmailUserObject->SelectedValue;
				if ($this->txtTokenFirebase) $this->objDtrcDevices->TokenFirebase = $this->txtTokenFirebase->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DtrcDevices object
				$this->objDtrcDevices->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DtrcDevices instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDtrcDevices() {
			$this->objDtrcDevices->Delete();
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
				case 'DtrcDevices': return $this->objDtrcDevices;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DtrcDevices fields -- will be created dynamically if not yet created
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
				case 'TokenFirebaseControl':
					if (!$this->txtTokenFirebase) return $this->txtTokenFirebase_Create();
					return $this->txtTokenFirebase;
				case 'TokenFirebaseLabel':
					if (!$this->lblTokenFirebase) return $this->lblTokenFirebase_Create();
					return $this->lblTokenFirebase;
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
					// Controls that point to DtrcDevices fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'EmailUserControl':
						return ($this->lstEmailUserObject = QType::Cast($mixValue, 'QControl'));
					case 'TokenFirebaseControl':
						return ($this->txtTokenFirebase = QType::Cast($mixValue, 'QControl'));
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