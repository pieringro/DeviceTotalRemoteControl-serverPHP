<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DtrcResources class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DtrcResources object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DtrcResourcesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DtrcResources $DtrcResources the actual DtrcResources data class being edited
	 * property QTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $TextItalianControl
	 * property-read QLabel $TextItalianLabel
	 * property QTextBox $TextEnglishControl
	 * property-read QLabel $TextEnglishLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DtrcResourcesMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DtrcResources objDtrcResources
		 * @access protected
		 */
		protected $objDtrcResources;

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

		// Controls that allow the editing of DtrcResources's individual data fields
        /**
         * @var QTextBox txtId;
         * @access protected
         */
		protected $txtId;

        /**
         * @var QTextBox txtTextItalian;
         * @access protected
         */
		protected $txtTextItalian;

        /**
         * @var QTextBox txtTextEnglish;
         * @access protected
         */
		protected $txtTextEnglish;


		// Controls that allow the viewing of DtrcResources's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

        /**
         * @var QLabel lblTextItalian
         * @access protected
         */
		protected $lblTextItalian;

        /**
         * @var QLabel lblTextEnglish
         * @access protected
         */
		protected $lblTextEnglish;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DtrcResourcesMetaControl to edit a single DtrcResources object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DtrcResources object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcResourcesMetaControl
		 * @param DtrcResources $objDtrcResources new or existing DtrcResources object
		 */
		 public function __construct($objParentObject, DtrcResources $objDtrcResources) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DtrcResourcesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DtrcResources object
			$this->objDtrcResources = $objDtrcResources;

			// Figure out if we're Editing or Creating New
			if ($this->objDtrcResources->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcResourcesMetaControl
		 * @param string $strId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcResources object creation - defaults to CreateOrEdit
 		 * @return DtrcResourcesMetaControl
		 */
		public static function Create($objParentObject, $strId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($strId)) {
				$objDtrcResources = DtrcResources::Load($strId);

				// DtrcResources was found -- return it!
				if ($objDtrcResources)
					return new DtrcResourcesMetaControl($objParentObject, $objDtrcResources);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DtrcResources object with PK arguments: ' . $strId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DtrcResourcesMetaControl($objParentObject, new DtrcResources());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcResourcesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcResources object creation - defaults to CreateOrEdit
		 * @return DtrcResourcesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::PathInfo(0);
			return DtrcResourcesMetaControl::Create($objParentObject, $strId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcResourcesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcResources object creation - defaults to CreateOrEdit
		 * @return DtrcResourcesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$strId = QApplication::QueryString('strId');
			return DtrcResourcesMetaControl::Create($objParentObject, $strId, $intCreateType);
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
			$this->txtId->Text = $this->objDtrcResources->Id;
			$this->txtId->Required = true;
			$this->txtId->MaxLength = DtrcResources::IdMaxLength;
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
			$this->lblId->Text = $this->objDtrcResources->Id;
			$this->lblId->Required = true;
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtTextItalian
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTextItalian_Create($strControlId = null) {
			$this->txtTextItalian = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTextItalian->Name = QApplication::Translate('Text Italian');
			$this->txtTextItalian->Text = $this->objDtrcResources->TextItalian;
			$this->txtTextItalian->MaxLength = DtrcResources::TextItalianMaxLength;
			return $this->txtTextItalian;
		}

		/**
		 * Create and setup QLabel lblTextItalian
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTextItalian_Create($strControlId = null) {
			$this->lblTextItalian = new QLabel($this->objParentObject, $strControlId);
			$this->lblTextItalian->Name = QApplication::Translate('Text Italian');
			$this->lblTextItalian->Text = $this->objDtrcResources->TextItalian;
			return $this->lblTextItalian;
		}

		/**
		 * Create and setup QTextBox txtTextEnglish
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtTextEnglish_Create($strControlId = null) {
			$this->txtTextEnglish = new QTextBox($this->objParentObject, $strControlId);
			$this->txtTextEnglish->Name = QApplication::Translate('Text English');
			$this->txtTextEnglish->Text = $this->objDtrcResources->TextEnglish;
			$this->txtTextEnglish->MaxLength = DtrcResources::TextEnglishMaxLength;
			return $this->txtTextEnglish;
		}

		/**
		 * Create and setup QLabel lblTextEnglish
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTextEnglish_Create($strControlId = null) {
			$this->lblTextEnglish = new QLabel($this->objParentObject, $strControlId);
			$this->lblTextEnglish->Name = QApplication::Translate('Text English');
			$this->lblTextEnglish->Text = $this->objDtrcResources->TextEnglish;
			return $this->lblTextEnglish;
		}



		/**
		 * Refresh this MetaControl with Data from the local DtrcResources object.
		 * @param boolean $blnReload reload DtrcResources from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDtrcResources->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objDtrcResources->Id;
			if ($this->lblId) $this->lblId->Text = $this->objDtrcResources->Id;

			if ($this->txtTextItalian) $this->txtTextItalian->Text = $this->objDtrcResources->TextItalian;
			if ($this->lblTextItalian) $this->lblTextItalian->Text = $this->objDtrcResources->TextItalian;

			if ($this->txtTextEnglish) $this->txtTextEnglish->Text = $this->objDtrcResources->TextEnglish;
			if ($this->lblTextEnglish) $this->lblTextEnglish->Text = $this->objDtrcResources->TextEnglish;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DTRCRESOURCES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DtrcResources instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDtrcResources() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objDtrcResources->Id = $this->txtId->Text;
				if ($this->txtTextItalian) $this->objDtrcResources->TextItalian = $this->txtTextItalian->Text;
				if ($this->txtTextEnglish) $this->objDtrcResources->TextEnglish = $this->txtTextEnglish->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DtrcResources object
				$this->objDtrcResources->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DtrcResources instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDtrcResources() {
			$this->objDtrcResources->Delete();
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
				case 'DtrcResources': return $this->objDtrcResources;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DtrcResources fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TextItalianControl':
					if (!$this->txtTextItalian) return $this->txtTextItalian_Create();
					return $this->txtTextItalian;
				case 'TextItalianLabel':
					if (!$this->lblTextItalian) return $this->lblTextItalian_Create();
					return $this->lblTextItalian;
				case 'TextEnglishControl':
					if (!$this->txtTextEnglish) return $this->txtTextEnglish_Create();
					return $this->txtTextEnglish;
				case 'TextEnglishLabel':
					if (!$this->lblTextEnglish) return $this->lblTextEnglish_Create();
					return $this->lblTextEnglish;
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
					// Controls that point to DtrcResources fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'TextItalianControl':
						return ($this->txtTextItalian = QType::Cast($mixValue, 'QControl'));
					case 'TextEnglishControl':
						return ($this->txtTextEnglish = QType::Cast($mixValue, 'QControl'));
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