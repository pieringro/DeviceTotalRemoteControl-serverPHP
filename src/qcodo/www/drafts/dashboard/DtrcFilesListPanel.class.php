<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the DtrcFiles class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of DtrcFiles objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this DtrcFilesListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My Application
	 * @subpackage Drafts
	 * 
	 */
	class DtrcFilesListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list DtrcFileses
		public $dtgDtrcFileses;

		// Other public QControls in this panel
		public $btnCreateNew;
		public $pxyEdit;

		// Callback Method Names
		protected $strSetEditPanelMethod;
		protected $strCloseEditPanelMethod;
		
		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = 'DtrcFilesListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgDtrcFileses = new DtrcFilesDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgDtrcFileses->CssClass = 'datagrid';
			$this->dtgDtrcFileses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgDtrcFileses->Paginator = new QPaginator($this->dtgDtrcFileses);
			$this->dtgDtrcFileses->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgDtrcFileses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for dtrc_files's properties, or you
			// can traverse down QQN::dtrc_files() to display fields that are down the hierarchy)
			$this->dtgDtrcFileses->MetaAddColumn('Id');
			$this->dtgDtrcFileses->MetaAddColumn(QQN::DtrcFiles()->IDDevicesObject);
			$this->dtgDtrcFileses->MetaAddColumn('Path');
			$this->dtgDtrcFileses->MetaAddColumn('Type');
			$this->dtgDtrcFileses->MetaAddColumn('Length');
			$this->dtgDtrcFileses->MetaAddColumn('DateCreated');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('DtrcFiles');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new DtrcFilesEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new DtrcFilesEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>