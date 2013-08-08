<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
        echo $form->labelEx($model,'parent_id');
        //echo $form->dropDownList($model, 'parent_id', MenuItem::model()->getOptions());
        echo $form->textField($model,'parent_id');
        echo $form->error($model,'parent_id');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'menu_id');
        echo $form->dropDownList($model, 'menu_id', Menu::model()->getOptions());
        //echo $form->textField($model,'menu_id');
        echo $form->error($model,'menu_id');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'item_id');
        echo $form->dropDownList($model, 'item_id', Item::model()->getOptions());
        //echo $form->textField($model,'item_id');
        echo $form->error($model,'item_id');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'prior');
        echo $form->textField($model,'prior');
        echo $form->error($model,'prior');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'visible');
        echo $form->dropDownList($model, 'visible', array(0 => 'Скрыто', 1 => 'Видимо'));
        //echo $form->textField($model,'visible');
        echo $form->error($model,'visible');
        ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->