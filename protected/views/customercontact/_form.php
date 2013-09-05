<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */
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
        'id' => 'customer-contact-form',
        'enableAjaxValidation' => false,
    )); */ ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        if (isset($_GET['cid'])) $values = Customer::model()->getOptions('id', 'value', 'value', $_GET['cid']);
        else $values = Customer::model()->getOptions();

        echo $form->labelEx($model, 'customer_id');
        echo $form->dropDownList($model, 'customer_id', $values, array('class' => 'input-block-level'));
        echo $form->error($model, 'customer_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'contact_type_id');
        echo $form->dropDownList($model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));
        echo $form->error($model, 'contact_type_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'value');
        echo $form->textField($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));
        echo $form->error($model, 'value');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));
        echo $form->error($model, 'description');
        ?>
    </div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->