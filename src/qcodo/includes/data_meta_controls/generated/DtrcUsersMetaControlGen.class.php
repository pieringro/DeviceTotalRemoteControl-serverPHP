<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DtrcUsers class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DtrcUsers object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DtrcUsersMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DtrcUsers $DtrcUsers the actual DtrcUsers data class being edited
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QTextBox $PassControl
	 * property-read QLabel $PassLabel
	 * property QTextBox $LangControl
	 * property-read QLabel $LangLabel
	 * property QCheckBox $InactiveControl
	 * property-read QLabel $InactiveLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DtrcUsersMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DtrcUsers objDtrcUsers
		 * @access protected
		 */
		protected $objDtrcUsers;

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

		// Controls that allow the editing of DtrcUsers's individual data fields
        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QTextBox txtPass;
         * @access protected
         */
		protected $txtPass;

        /**
         * @var QTextBox txtLang;
         * @access protected
         */
		protected $txtLang;

        /**
         * @var QCheckBox chkInactive;
         * @access protected
         */
		protected $chkInactive;


		// Controls that allow the viewing of DtrcUsers's individual data fields
        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblPass
         * @access protected
         */
		protected $lblPass;

        /**
         * @var QLabel lblLang
         * @access protected
         */
		protected $lblLang;

        /**
         * @var QLabel lblInactive
         * @access protected
         */
		protected $lblInactive;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DtrcUsersMetaControl to edit a single DtrcUsers object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DtrcUsers object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcUsersMetaControl
		 * @param DtrcUsers $objDtrcUsers new or existing DtrcUsers object
		 */
		 public function __construct($objParentObject, DtrcUsers $objDtrcUsers) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DtrcUsersMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DtrcUsers object
			$this->objDtrcUsers = $objDtrcUsers;

			// Figure out if we're Editing or Creating New
			if ($this->objDtrcUsers->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcUsersMetaControl
		 * @param string $strEmail primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcUsers object creation - defaults to CreateOrEdit
 		 * @return DtrcUsersMetaControl
		 */
		public static function Create($objParentObject, $strEmail = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($strEmail)) {
				$objDtrcUsers = DtrcUsers::Load($strEmail);

				// DtrcUsers was found -- return it!
				if ($objDtrcUsers)
					return new DtrcUsersMetaControl($objParentObject, $objDtrcUsers);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DtrcUsers object with PK arguments: ' . $strEmail);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DtrcUsersMetaControl($objParentObject, new DtrcUsers());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcUsersMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcUsers object creation - defaults to CreateOrEdit
		 * @return DtrcUsersMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strEmail = QApplication::PathInfo(0);
			return DtrcUsersMetaControl::Create($objParentObject, $strEmail, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcUsersMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcUsers object creation - defaults to CreateOrEdit
		 * @return DtrcUsersMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strEmail = QApplication::QueryString('strEmail');
			return DtrcUsersMetaControl::Create($objParentObject, $strEmail, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objDtrcUsers->Email;
			$this->txtEmail->Required = true;
			$this->txtEmail->MaxLength = DtrcUsers::EmailMaxLength;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objDtrcUsers->Email;
			$this->lblEmail->Required = true;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QTextBox txtPass
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPass_Create($strControlId = null) {
			$this->txtPass = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPass->Name = QApplication::Translate('Pass');
			$this->txtPass->Text = $this->objDtrcUsers->Pass;
			$this->txtPass->Required = true;
			$this->txtPass->MaxLength = DtrcUsers::PassMaxLength;
			return $this->txtPass;
		}

		/**
		 * Create and setup QLabel lblPass
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPass_Create($strControlId = null) {
			$this->lblPass = new QLabel($this->objParentObject, $strControlId);
			$this->lblPass->Name = QApplication::Translate('Pass');
			$this->lblPass->Text = $this->objDtrcUsers->Pass;
			$this->lblPass->Required = true;
			return $this->lblPass;
		}

		/**
		 * Create and setup QTextBox txtLang
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLang_Create($strControlId = null) {
			$this->txtLang = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLang->Name = QApplication::Translate('Lang');
			$this->txtLang->Text = $this->objDtrcUsers->Lang;
			$this->txtLang->MaxLength = DtrcUsers::LangMaxLength;
			return $this->txtLang;
		}

		/**
		 * Create and setup QLabel lblLang
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLang_Create($strControlId = null) {
			$this->lblLang = new QLabel($this->objParentObject, $strControlId);
			$this->lblLang->Name = QApplication::Translate('Lang');
			$this->lblLang->Text = $this->objDtrcUsers->Lang;
			return $this->lblLang;
		}

		/**
		 * Create and setup QCheckBox chkInactive
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInactive_Create($strControlId = null) {
			$this->chkInactive = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInactive->Name = QApplication::Translate('Inactive');
			$this->chkInactive->Checked = $this->objDtrcUsers->Inactive;
			return $this->chkInactive;
		}

		/**
		 * Create and setup QLabel lblInactive
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInactive_Create($strControlId = null) {
			$this->lblInactive = new QLabel($this->objParentObject, $strControlId);
			$this->lblInactive->Name = QApplication::Translate('Inactive');
			$this->lblInactive->Text = ($this->objDtrcUsers->Inactive) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInactive;
		}



		/**
		 * Refresh this MetaControl with Data from the local DtrcUsers object.
		 * @param boolean $blnReload reload DtrcUsers from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDtrcUsers->Reload();

			if ($this->txtEmail) $this->txtEmail->Text = $this->objDtrcUsers->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objDtrcUsers->Email;

			if ($this->txtPass) $this->txtPass->Text = $this->objDtrcUsers->Pass;
			if ($this->lblPass) $this->lblPass->Text = $this->objDtrcUsers->Pass;

			if ($this->txtLang) $this->txtLang->Text = $this->objDtrcUsers->Lang;
			if ($this->lblLang) $this->lblLang->Text = $this->objDtrcUsers->Lang;

			if ($this->chkInactive) $this->chkInactive->Checked = $this->objDtrcUsers->Inactive;
			if ($this->lblInactive) $this->lblInactive->Text = ($this->objDtrcUsers->Inactive) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DTRCUSERS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DtrcUsers instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDtrcUsers() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtEmail) $this->objDtrcUsers->Email = $this->txtEmail->Text;
				if ($this->txtPass) $this->objDtrcUsers->Pass = $this->txtPass->Text;
				if ($this->txtLang) $this->objDtrcUsers->Lang = $this->txtLang->Text;
				if ($this->chkInactive) $this->objDtrcUsers->Inactive = $this->chkInactive->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DtrcUsers object
				$this->objDtrcUsers->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DtrcUsers instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDtrcUsers() {
			$this->objDtrcUsers->Delete();
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
				case 'DtrcUsers': return $this->objDtrcUsers;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DtrcUsers fields -- will be created dynamically if not yet created
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'PassControl':
					if (!$this->txtPass) return $this->txtPass_Create();
					return $this->txtPass;
				case 'PassLabel':
					if (!$this->lblPass) return $this->lblPass_Create();
					return $this->lblPass;
				case 'LangControl':
					if (!$this->txtLang) return $this->txtLang_Create();
					return $this->txtLang;
				case 'LangLabel':
					if (!$this->lblLang) return $this->lblLang_Create();
					return $this->lblLang;
				case 'InactiveControl':
					if (!$this->chkInactive) return $this->chkInactive_Create();
					return $this->chkInactive;
				case 'InactiveLabel':
					if (!$this->lblInactive) return $this->lblInactive_Create();
					return $this->lblInactive;
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
					// Controls that point to DtrcUsers fields
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'PassControl':
						return ($this->txtPass = QType::Cast($mixValue, 'QControl'));
					case 'LangControl':
						return ($this->txtLang = QType::Cast($mixValue, 'QControl'));
					case 'InactiveControl':
						return ($this->chkInactive = QType::Cast($mixValue, 'QControl'));
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