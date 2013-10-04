<?php
/* @var $this ShippingController */
/* @var $this ->_model Shipping */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array(
        'class' => 'well',
    ),
));
echo $form->errorSummary($this->_model);

// если есть параметр sid, то выбираем эту спецификацию
if (isset($_GET['sid'])) $this->_model->setAttribute('specification_id', $_GET['sid']);

echo $form->dropDownListRow($this->_model, 'specification_id', Specification::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->datepickerRow($this->_model, 'plan_date', array(
    'class' => 'span2 text-center input-inline',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'viewMode' => 1,
        'autoclose' => true,
        'language' => 'ru',
        'weekStart' => 1,
    )
));
echo $form->datepickerRow($this->_model, 'real_date', array(
    'class' => 'span2 text-center input-inline',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'viewMode' => 1,
        'autoclose' => true,
        'language' => 'ru',
        'weekStart' => 1,
    )
));
echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit3buttons();

$this->endWidget();

