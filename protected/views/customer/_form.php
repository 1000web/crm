<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'customer-form',
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'organization_id');
        echo $form->dropDownList($model, 'organization_id', Organization::model()->getOptions());
        echo $form->error($model, 'organization_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'firstname');
        echo $form->textField($model, 'firstname', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'firstname');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'lastname');
        echo $form->textField($model, 'lastname', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'lastname');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'position');
        echo $form->textField($model, 'position', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'position');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'description');
        ?>
    </div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->