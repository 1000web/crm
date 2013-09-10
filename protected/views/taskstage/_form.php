<?php
/* @var $this TaskStageController */
/* @var $this->_model TaskStage */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

echo $form->textFieldRow($this->_model, 'prior', array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'finished', array(1 => 'Неактивна', 2 => 'Активна'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($this->_model->isNewRecord);

$this->endWidget();