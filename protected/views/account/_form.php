<?php
/* @var $this AccountController */
/* @var $this ->_model Account */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array(
        'class' => 'well',
    ),
));
echo $form->errorSummary($this->_model);

// если есть параметр oid, то выбираем эту организацию
if (isset($_GET['oid'])) $this->_model->setAttribute('organization_id', $_GET['oid']);

echo $form->dropDownListRow($this->_model, 'organization_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'bank', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'bik', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'inn', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'kpp', array('maxlength' => 10, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'korr', array('maxlength' => 25, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'schet', array('maxlength' => 25, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit3buttons();

$this->endWidget();

