<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organization-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_type_id'); ?>
		<?php echo $form->textField($model,'organization_type_id'); ?>
		<?php echo $form->error($model,'organization_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_group_id'); ?>
		<?php echo $form->textField($model,'organization_group_id'); ?>
		<?php echo $form->error($model,'organization_group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization_region_id'); ?>
		<?php echo $form->textField($model,'organization_region_id'); ?>
		<?php echo $form->error($model,'organization_region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->