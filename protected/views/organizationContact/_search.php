<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'create_time'); ?>
        <?php echo $form->textField($model, 'create_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'update_time'); ?>
        <?php echo $form->textField($model, 'update_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'create_user_id'); ?>
        <?php echo $form->textField($model, 'create_user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'update_user_id'); ?>
        <?php echo $form->textField($model, 'update_user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'organization_id'); ?>
        <?php echo $form->textField($model, 'organization_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'contact_type_id'); ?>
        <?php echo $form->textField($model, 'contact_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'value'); ?>
        <?php echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->