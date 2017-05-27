<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the DtrcFiles class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single DtrcFiles object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a DtrcFilesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read DtrcFiles $DtrcFiles the actual DtrcFiles data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $IDDevicesControl
	 * property-read QLabel $IDDevicesLabel
	 * property QTextBox $PathControl
	 * property-read QLabel $PathLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class DtrcFilesMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var DtrcFiles objDtrcFiles
		 * @access protected
		 */
		protected $objDtrcFiles;

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

		// Controls that allow the editing of DtrcFiles's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstIDDevicesObject;
         * @access protected
         */
		protected $lstIDDevicesObject;

        /**
         * @var QTextBox txtPath;
         * @access protected
         */
		protected $txtPath;


		// Controls that allow the viewing of DtrcFiles's individual data fields
        /**
         * @var QLabel lblIDDevices
         * @access protected
         */
		protected $lblIDDevices;

        /**
         * @var QLabel lblPath
         * @access protected
         */
		protected $lblPath;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * DtrcFilesMetaControl to edit a single DtrcFiles object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single DtrcFiles object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcFilesMetaControl
		 * @param DtrcFiles $objDtrcFiles new or existing DtrcFiles object
		 */
		 public function __construct($objParentObject, DtrcFiles $objDtrcFiles) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this DtrcFilesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked DtrcFiles object
			$this->objDtrcFiles = $objDtrcFiles;

			// Figure out if we're Editing or Creating New
			if ($this->objDtrcFiles->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcFilesMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcFiles object creation - defaults to CreateOrEdit
 		 * @return DtrcFilesMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objDtrcFiles = DtrcFiles::Load($intId);

				// DtrcFiles was found -- return it!
				if ($objDtrcFiles)
					return new DtrcFilesMetaControl($objParentObject, $objDtrcFiles);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a DtrcFiles object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new DtrcFilesMetaControl($objParentObject, new DtrcFiles());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcFilesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcFiles object creation - defaults to CreateOrEdit
		 * @return DtrcFilesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return DtrcFilesMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this DtrcFilesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing DtrcFiles object creation - defaults to CreateOrEdit
		 * @return DtrcFilesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return DtrcFilesMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objDtrcFiles->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstIDDevicesObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIDDevicesObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIDDevicesObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstIDDevicesObject->Name = QApplication::Translate('I D Devices Object');
			$this->lstIDDevicesObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstIDDevicesObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIDDevicesObjectCursor = DtrcDevices::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIDDevicesObject = DtrcDevices::InstantiateCursor($objIDDevicesObjectCursor)) {
				$objListItem = new QListItem($objIDDevicesObject->__toString(), $objIDDevicesObject->Id);
				if (($this->objDtrcFiles->IDDevicesObject) && ($this->objDtrcFiles->IDDevicesObject->Id == $objIDDevicesObject->Id))
					$objListItem->Selected = true;
				$this->lstIDDevicesObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstIDDevicesObject;
		}

		/**
		 * Create and setup QLabel lblIDDevices
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIDDevices_Create($strControlId = null) {
			$this->lblIDDevices = new QLabel($this->objParentObject, $strControlId);
			$this->lblIDDevices->Name = QApplication::Translate('I D Devices Object');
			$this->lblIDDevices->Text = ($this->objDtrcFiles->IDDevicesObject) ? $this->objDtrcFiles->IDDevicesObject->__toString() : null;
			$this->lblIDDevices->Required = true;
			return $this->lblIDDevices;
		}

		/**
		 * Create and setup QTextBox txtPath
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtPath_Create($strControlId = null) {
			$this->txtPath = new QTextBox($this->objParentObject, $strControlId);
			$this->txtPath->Name = QApplication::Translate('Path');
			$this->txtPath->Text = $this->objDtrcFiles->Path;
			$this->txtPath->MaxLength = DtrcFiles::PathMaxLength;
			return $this->txtPath;
		}

		/**
		 * Create and setup QLabel lblPath
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPath_Create($strControlId = null) {
			$this->lblPath = new QLabel($this->objParentObject, $strControlId);
			$this->lblPath->Name = QApplication::Translate('Path');
			$this->lblPath->Text = $this->objDtrcFiles->Path;
			return $this->lblPath;
		}



		/**
		 * Refresh this MetaControl with Data from the local DtrcFiles object.
		 * @param boolean $blnReload reload DtrcFiles from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objDtrcFiles->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objDtrcFiles->Id;

			if ($this->lstIDDevicesObject) {
					$this->lstIDDevicesObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstIDDevicesObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objIDDevicesObjectArray = DtrcDevices::LoadAll();
				if ($objIDDevicesObjectArray) foreach ($objIDDevicesObjectArray as $objIDDevicesObject) {
					$objListItem = new QListItem($objIDDevicesObject->__toString(), $objIDDevicesObject->Id);
					if (($this->objDtrcFiles->IDDevicesObject) && ($this->objDtrcFiles->IDDevicesObject->Id == $objIDDevicesObject->Id))
						$objListItem->Selected = true;
					$this->lstIDDevicesObject->AddItem($objListItem);
				}
			}
			if ($this->lblIDDevices) $this->lblIDDevices->Text = ($this->objDtrcFiles->IDDevicesObject) ? $this->objDtrcFiles->IDDevicesObject->__toString() : null;

			if ($this->txtPath) $this->txtPath->Text = $this->objDtrcFiles->Path;
			if ($this->lblPath) $this->lblPath->Text = $this->objDtrcFiles->Path;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC DTRCFILES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's DtrcFiles instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveDtrcFiles() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstIDDevicesObject) $this->objDtrcFiles->IDDevices = $this->lstIDDevicesObject->SelectedValue;
				if ($this->txtPath) $this->objDtrcFiles->Path = $this->txtPath->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the DtrcFiles object
				$this->objDtrcFiles->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's DtrcFiles instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteDtrcFiles() {
			$this->objDtrcFiles->Delete();
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
				case 'DtrcFiles': return $this->objDtrcFiles;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to DtrcFiles fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IDDevicesControl':
					if (!$this->lstIDDevicesObject) return $this->lstIDDevicesObject_Create();
					return $this->lstIDDevicesObject;
				case 'IDDevicesLabel':
					if (!$this->lblIDDevices) return $this->lblIDDevices_Create();
					return $this->lblIDDevices;
				case 'PathControl':
					if (!$this->txtPath) return $this->txtPath_Create();
					return $this->txtPath;
				case 'PathLabel':
					if (!$this->lblPath) return $this->lblPath_Create();
					return $this->lblPath;
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
					// Controls that point to DtrcFiles fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'IDDevicesControl':
						return ($this->lstIDDevicesObject = QType::Cast($mixValue, 'QControl'));
					case 'PathControl':
						return ($this->txtPath = QType::Cast($mixValue, 'QControl'));
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