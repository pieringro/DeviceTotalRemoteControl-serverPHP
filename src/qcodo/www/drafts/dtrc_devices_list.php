<?php

// Load the Qcodo Development Framework
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the DtrcDevices class.  It uses the code-generated
 * DtrcDevicesDataGrid control which has meta-methods to help with
 * easily creating/defining DtrcDevices columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both dtrc_devices_list.php AND
 * dtrc_devices_list.tpl.php out of this Form Drafts directory.
 *
 * @package My Application
 * @subpackage Drafts
 */
class DtrcDevicesListForm extends QForm {

    // Local instance of the Meta DataGrid to list DtrcDeviceses
    protected $dtgDtrcDeviceses;

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
        $this->dtgDtrcDeviceses = new DtrcDevicesDataGrid($this);

        // Style the DataGrid (if desired)
        $this->dtgDtrcDeviceses->CssClass = 'datagrid';
        $this->dtgDtrcDeviceses->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgDtrcDeviceses->Paginator = new QPaginator($this->dtgDtrcDeviceses);
        $this->dtgDtrcDeviceses->ItemsPerPage = 20;

        // Use the MetaDataGrid functionality to add Columns for this datagrid
        // Create an Edit Column
        $strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/dtrc_devices_edit.php';
        $this->dtgDtrcDeviceses->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

        // Create the Other Columns (note that you can use strings for dtrc_devices's properties, or you
        // can traverse down QQN::dtrc_devices() to display fields that are down the hierarchy)
        $this->dtgDtrcDeviceses->MetaAddColumn('Id');
        $this->dtgDtrcDeviceses->MetaAddColumn(QQN::DtrcDevices()->EmailUserObject);
        $this->dtgDtrcDeviceses->MetaAddColumn('TokenFirebase');
    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// dtrc_devices_list.tpl.php as the included HTML template file
DtrcDevicesListForm::Run('DtrcDevicesListForm');
?>