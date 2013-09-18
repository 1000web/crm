<?php
/* @var $this CustomerContactController */
/* @var $this ->_model CustomerContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

// если есть параметр did, то выбираем эту сделку
if (isset($_GET['did'])) $this->_model->setAttribute('deal_id', $_GET['did']);

echo $form->dropDownListRow($this->_model, 'deal_id', Deal::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'payment_type_id', PaymentType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'amount', array('maxlength' => 15, 'class' => 'input-block-level'));
echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));
echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit_button();

$this->endWidget();