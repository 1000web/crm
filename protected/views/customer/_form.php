<?php
/* @var $this CustomerController */
/* @var $this ->_model Customer */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

// если есть параметр oid, то выбираем эту организацию
if (isset($_GET['oid'])) $this->_model->setAttribute('organization_id', $_GET['oid']);

echo $form->dropDownListRow($this->_model, 'organization_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'position', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit_3buttons();

$this->endWidget();
