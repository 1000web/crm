<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

echo $form->dropDownListRow($model, 'parent_id', $model->getOptions('id', 'title'));

echo $form->textFieldRow($model, 'module', array('size' => 60, 'maxlength' => 64));

echo $form->textFieldRow($model, 'controller', array('size' => 60, 'maxlength' => 64));

echo $form->textFieldRow($model, 'action', array('size' => 60, 'maxlength' => 64));

echo $form->textFieldRow($model, 'url', array('size' => 60, 'maxlength' => 255));

echo $form->textFieldRow($model, 'icon', array('size' => 60, 'maxlength' => 64));

echo $form->textFieldRow($model, 'title', array('size' => 60, 'maxlength' => 255));

echo $form->textFieldRow($model, 'h1', array('size' => 60, 'maxlength' => 255));

echo $form->textFieldRow($model, 'value', array('size' => 60, 'maxlength' => 255));

echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();