<?php
/* @var $this CustomerContactController */
/* @var $this ->_model CustomerContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

if (isset($_GET['cid'])) $values = Customer::model()->getOptions('id', 'value', 'value', array('id' => $_GET['cid']));
else $values = Customer::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'customer_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit_button();

$this->endWidget();