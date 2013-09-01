<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */
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
        <?php echo $form->label($model, 'parent_id'); ?>
        <?php echo $form->textField($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'menu_id'); ?>
        <?php echo $form->textField($model, 'menu_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'item_id'); ?>
        <?php echo $form->textField($model, 'item_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'prior'); ?>
        <?php echo $form->textField($model, 'prior'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'visible'); ?>
        <?php echo $form->textField($model, 'visible'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->