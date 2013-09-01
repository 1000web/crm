<?php
/* @var $this KbController */
/* @var $model Kb */
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
        'id' => 'kb-form',
        'enableAjaxValidation' => false,
    )); */ ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'state');
        echo $form->textField($model, 'state');
        echo $form->error($model, 'state');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'question');
        echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'question');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'answer');
        echo $form->textArea($model, 'answer', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'answer');
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