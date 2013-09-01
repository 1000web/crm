<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'htmlOptions' => array('class' => 'well'),
    ));
    ?>
    <?php /* $form = $this->beginWidget('CActiveForm', array(
        'id' => 'organization-contact-form',
        'enableAjaxValidation' => false,
    )); */ ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
        else $values = Organization::model()->getOptions();

        echo $form->labelEx($model, 'organization_id');
        echo $form->dropDownList($model, 'organization_id', $values);
        echo $form->error($model, 'organization_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'contact_type_id');
        echo $form->dropDownList($model, 'contact_type_id', ContactType::model()->getOptions());
        echo $form->error($model, 'contact_type_id');
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