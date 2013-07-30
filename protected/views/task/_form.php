<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'task-form',
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'task_type_id'); ?>
        <?php echo $form->textField($model, 'task_type_id'); ?>
        <?php echo $form->error($model, 'task_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'datetime'); ?>
        <?php echo $form->textField($model, 'datetime'); ?>
        <?php echo $form->error($model, 'datetime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_id'); ?>
        <?php echo $form->textField($model, 'user_id'); ?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'value'); ?>
        <?php echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'value'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->