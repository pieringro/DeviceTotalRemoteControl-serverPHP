<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the DtrcFiles class.  It uses the code-generated
	 * DtrcFilesMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a DtrcFiles columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dtrc_files_edit.php AND
	 * dtrc_files_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class DtrcFilesEditPanel extends QPanel {
		// Local instance of the DtrcFilesMetaControl
		protected $mctDtrcFiles;

		// Controls for DtrcFiles's Data Fields
		public $lblId;
		public $lstIDDevicesObject;
		public $txtPath;
		public $txtType;
		public $txtLength;
		public $calDateCreated;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'DtrcFilesEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DtrcFilesMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDtrcFiles = DtrcFilesMetaControl::Create($this, $intId);

			// Call MetaControl's methods to create qcontrols based on DtrcFiles's data fields
			$this->lblId = $this->mctDtrcFiles->lblId_Create();
			$this->lstIDDevicesObject = $this->mctDtrcFiles->lstIDDevicesObject_Create();
			$this->txtPath = $this->mctDtrcFiles->txtPath_Create();
			$this->txtType = $this->mctDtrcFiles->txtType_Create();
			$this->txtLength = $this->mctDtrcFiles->txtLength_Create();
			$this->calDateCreated = $this->mctDtrcFiles->calDateCreated_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('DtrcFiles') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDtrcFiles->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DtrcFilesMetaControl
			$this->mctDtrcFiles->SaveDtrcFiles();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DtrcFilesMetaControl
			$this->mctDtrcFiles->DeleteDtrcFiles();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>