<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the DtrcUsers class.  It uses the code-generated
	 * DtrcUsersDataGrid control which has meta-methods to help with
	 * easily creating/defining DtrcUsers columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dtrc_users_list.php AND
	 * dtrc_users_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class DtrcUsersListForm extends QForm {
		// Local instance of the Meta DataGrid to list DtrcUserses
		protected $dtgDtrcUserses;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgDtrcUserses = new DtrcUsersDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgDtrcUserses->CssClass = 'datagrid';
			$this->dtgDtrcUserses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgDtrcUserses->Paginator = new QPaginator($this->dtgDtrcUserses);
			$this->dtgDtrcUserses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/dtrc_users_edit.php';
			$this->dtgDtrcUserses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for dtrc_users's properties, or you
			// can traverse down QQN::dtrc_users() to display fields that are down the hierarchy)
			$this->dtgDtrcUserses->MetaAddColumn('Email');
			$this->dtgDtrcUserses->MetaAddColumn('Pass');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// dtrc_users_list.tpl.php as the included HTML template file
	DtrcUsersListForm::Run('DtrcUsersListForm');
?>