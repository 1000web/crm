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

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'bank', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'bik', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'inn', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'kpp', array('maxlength' => 10, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'korr', array('maxlength' => 25, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'schet', array('maxlength' => 25, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($this->_model->isNewRecord);

$this->endWidget();

