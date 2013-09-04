<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="span11">
<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'htmlOptions' => array('class' => 'well'),
    ));
    ?>
    <?php /* $form = $this->beginWidget('CActiveForm', array(
        'id' => 'organization-form',
        'enableAjaxValidation' => false,
    )); */ ?>

    <?php echo $form->errorSummary($model); ?>

        <?php
        echo $form->labelEx($model, 'organization_type_id');
        echo $form->dropDownList($model, 'organization_type_id', OrganizationType::model()->getOptions(), array('class' => 'input-block-level'));
        echo $form->error($model, 'organization_type_id');
        ?>
        <?php
        echo $form->labelEx($model, 'organization_group_id');
        echo $form->dropDownList($model, 'organization_group_id', OrganizationGroup::model()->getOptions(), array('class' => 'input-block-level'));
        echo $form->error($model, 'organization_group_id');
        ?>
        <?php
        echo $form->labelEx($model, 'organization_region_id');
        echo $form->dropDownList($model, 'organization_region_id', OrganizationRegion::model()->getOptions(), array('class' => 'input-block-level'));
        echo $form->error($model, 'organization_region_id');
        ?>
        <?php
        echo $form->labelEx($model, 'value');
        echo $form->textField($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));
        //echo $form->textArea($model, 'value', array('rows' => 4, 'class' => 'input-block-level'));
        echo $form->error($model, 'value');
        ?>
        <?php
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));
        echo $form->error($model, 'description');
        ?>

    <?php echo $this->submit_button($model->isNewRecord); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->
    </div>
</div>