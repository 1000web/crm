<?php
/* @var $this TaskPriorController */
/* @var $model TaskPrior */
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
        'id' => 'task-prior-form',
        'enableAjaxValidation' => false,
    )); */ ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'prior');
        echo $form->textField($model, 'prior', array('class' => 'input-block-level'));
        echo $form->error($model, 'prior');
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