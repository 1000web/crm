<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'organization-form',
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'organization_type_id');
        echo $form->dropDownList($model, 'organization_type_id', $modelType->getOptions());
        echo $form->error($model, 'organization_type_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'organization_group_id');
        echo $form->dropDownList($model, 'organization_group_id', $modelGroup->getOptions());
        echo $form->error($model, 'organization_group_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'organization_region_id');
        echo $form->dropDownList($model, 'organization_region_id', $modelRegion->getOptions());
        echo $form->error($model, 'organization_region_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'value');
        echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'value');
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