<?php
/* @var $this SpecificationController */
/* @var $this ->_model Specification */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array(
        'class' => 'well',
    ),
));
echo $form->errorSummary($this->_model);

// если есть параметр oid, то выбираем эту организацию
if (isset($_GET['did'])) $this->_model->setAttribute('deal_id', $_GET['did']);

echo $form->dropDownListRow($this->_model, 'deal_id', Deal::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'spkd_id', Spkd::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'zakaz_num', array('maxlength' => 4, 'class' => 'input-block-level'));

//echo $form->textFieldRow($this->_model, 'zakaz_date', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->datepickerRow($this->_model, 'zakaz_date', array(
    'class' => 'span2 text-center input-inline',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'viewMode' => 1,
        'autoclose' => true,
        'language' => 'ru',
        'weekStart' => 1,
    )
));
echo $form->textFieldRow($this->_model, 'out_num', array('maxlength' => 16, 'class' => 'input-block-level'));
//echo $form->textFieldRow($this->_model, 'out_date', array('maxlength' => 10, 'class' => 'input-block-level'));
echo $form->datepickerRow($this->_model, 'out_date', array(
    'class' => 'span2 text-center input-inline',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'viewMode' => 1,
        'autoclose' => true,
        'language' => 'ru',
        'weekStart' => 1,
    )
));

echo $form->dropDownListRow($this->_model, 'organization_gruz_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if($this->_model->organization_gruz_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_gruz_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_gruz_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'organization_end_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if($this->_model->organization_end_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_end_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_end_id), true),
        array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit3buttons();

$this->endWidget();

