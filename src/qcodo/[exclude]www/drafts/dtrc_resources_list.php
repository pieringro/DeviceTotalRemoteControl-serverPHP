<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the DtrcResources class.  It uses the code-generated
	 * DtrcResourcesDataGrid control which has meta-methods to help with
	 * easily creating/defining DtrcResources columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both dtrc_resources_list.php AND
	 * dtrc_resources_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class DtrcResourcesListForm extends QForm {
		// Local instance of the Meta DataGrid to list DtrcResourceses
		protected $dtgDtrcResourceses;

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
			$this->dtgDtrcResourceses = new DtrcResourcesDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgDtrcResourceses->CssClass = 'datagrid';
			$this->dtgDtrcResourceses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgDtrcResourceses->Paginator = new QPaginator($this->dtgDtrcResourceses);
			$this->dtgDtrcResourceses->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/dtrc_resources_edit.php';
			$this->dtgDtrcResourceses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for dtrc_resources's properties, or you
			// can traverse down QQN::dtrc_resources() to display fields that are down the hierarchy)
			$this->dtgDtrcResourceses->MetaAddColumn('Id');
			$this->dtgDtrcResourceses->MetaAddColumn('TextItalian');
			$this->dtgDtrcResourceses->MetaAddColumn('TextEnglish');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// dtrc_resources_list.tpl.php as the included HTML template file
	DtrcResourcesListForm::Run('DtrcResourcesListForm');
?>