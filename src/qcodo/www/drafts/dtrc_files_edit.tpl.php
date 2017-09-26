<?php
	// This is the HTML template include file (.tpl.php) for the dtrc_files_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('DtrcFiles') . ' - ' . $this->mctDtrcFiles->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctDtrcFiles->TitleVerb); ?></h2>
		<h1><?php _t('DtrcFiles')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblId->RenderWithName(); ?>

		<?php $this->lstIDDevicesObject->RenderWithName(); ?>

		<?php $this->txtPath->RenderWithName(); ?>

		<?php $this->txtType->RenderWithName(); ?>

		<?php $this->txtLength->RenderWithName(); ?>

		<?php $this->calDateCreated->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>