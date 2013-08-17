<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
        echo $form->labelEx($model,'parent_id');
        echo $form->dropDownList($model,'parent_id', $model->getOptions('id', 'title'));
        echo $form->error($model,'parent_id');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'module');
        echo $form->textField($model,'module',array('size'=>60,'maxlength'=>64));
        echo $form->error($model,'module');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'controller');
        echo $form->textField($model,'controller',array('size'=>60,'maxlength'=>64));
        echo $form->error($model,'controller');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'action');
        echo $form->textField($model,'action',array('size'=>60,'maxlength'=>64));
        echo $form->error($model,'action');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'icon');
        echo $form->textField($model,'icon',array('size'=>60,'maxlength'=>64));
        echo $form->error($model,'icon');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'title');
        echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255));
        echo $form->error($model,'title');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'h1');
        echo $form->textField($model,'h1',array('size'=>60,'maxlength'=>255));
        echo $form->error($model,'h1');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'value');
        echo $form->textField($model,'value',array('size'=>60,'maxlength'=>255));
        echo $form->error($model,'value');
        ?>
	</div>

	<div class="row">
		<?php
        echo $form->labelEx($model,'description');
        echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50));
        echo $form->error($model,'description');
        ?>
	</div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->