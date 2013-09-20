<?php
/* @var $this CustomerContactController */
/* @var $this ->_model CustomerContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

// если есть параметр cid, то выбираем соответствующего сотрудника
if (isset($_GET['cid'])) $this->_model->setAttribute('customer_id', $_GET['cid']);

echo $form->dropDownListRow($this->_model, 'customer_id', Customer::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit3buttons();

$this->endWidget();