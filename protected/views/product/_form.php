<?php
/* @var $this ProductController */
/* @var $this ->_model Product */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

// если есть параметр parent_id, то выбираем его
if (isset($_GET['parent_id'])) $this->_model->setAttribute('parent_id', $_GET['parent_id']);

echo $form->dropDownListRow($this->_model, 'parent_id', Product::model()->getOptions('id', 'value', 'value', NULL, TRUE), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'product_type_id', ProductType::model()->getOptions('id','value','prior'), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit_button();

$this->endWidget();