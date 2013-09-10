<?php
/* @var $this CustomerController */
/* @var $this->_model Customer */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'position', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($this->_model->isNewRecord);

$this->endWidget();
