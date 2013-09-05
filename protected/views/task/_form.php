<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

echo $form->dropDownListRow($model, 'task_type_id', TaskType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'datetime');

echo $form->textFieldRow($model, 'user_id', array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();