<?php
/* @var $this DealController */
/* @var $this ->_model Deal */
/* @var $form CActiveForm */

Yii::app()->bootstrap->registerAssetCss('bootstrap-slider.css');
Yii::app()->bootstrap->registerAssetJs('bootstrap-slider.js');

//Yii::app()->bootstrap->registerAssetCss('bootstrap-datepicker.css');
//Yii::app()->bootstrap->registerAssetJs('bootstrap.datepicker.js');

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

echo $form->datepickerRow($this->_model, 'open_date', array(
    'class' => 'span4',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'weekStart' => 1,
        'viewMode' => 1,
    )
));
echo $form->datepickerRow($this->_model, 'close_date', array(
    'class' => 'span4',
    /*
    'htmlOptions' => array(
        'append' => 'sdf',
    ),/**/
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'weekStart' => 1,
        'viewMode' => 1,
    )
));
?>
    <div class="clear"></div>
<?php
echo $form->textField($this->_model, 'external_number', array(
    'maxlength' => 255,
    'class' => 'span5',
    'placeholder' => $this->_model->getLabel('external_number'),
));
//echo " / ";
echo $form->textField($this->_model, 'inner_number', array(
    'maxlength' => 255,
    'class' => 'span5',
    'placeholder' => $this->_model->getLabel('inner_number'),
));

echo $form->dropDownListRow($this->_model, 'owner_id', Users::model()->getOptions('id', 'username'), array('class' => 'input-block-level'));

// Наша организация №1 в списке
$values = Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => 1), true);
echo $form->dropDownListRow($this->_model, 'performer_id', $values, array('class' => 'input-block-level'));


echo $form->sliderRow($this->_model, 'probability', array(
    'class' => 'span11',
    'options' => array(
        'value' => intval($this->_model->probability),
        'min' => 0,
        'max' => 100,
        'step' => 25,
        'range' => false,
    )
));

// если есть параметр oid, то выбираем эту организацию
if (isset($_GET['oid'])) $this->_model->setAttribute('organization_id', $_GET['oid']);
echo $form->dropDownListRow($this->_model, 'organization_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));

// если есть параметр oid, то показываем только сотрудников этой организации
if (isset($_GET['oid'])) $values = Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $_GET['oid']));
// иначе показываем всех сотрудников
else  $values = Customer::model()->getOptions();

// если есть параметр cid, то выбираем соответствующего сотрудника
if (isset($_GET['cid'])) $this->_model->setAttribute('customer_id', $_GET['cid']);

echo $form->dropDownListRow($this->_model, 'customer_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'deal_source_id', DealSource::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'deal_stage_id', DealStage::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'amount', array(
    'class' => 'span2 text-center',
    'maxlength' => 15,
    'append' => 'Руб.',
));

echo $form->textAreaRow($this->_model, 'value', array('rows' => 4,
    'class' => 'input-block-level',
    'placeholder' => $this->_model->getLabel('value'),
));
echo $form->textArea($this->_model, 'description', array('rows' => 4,
    'class' => 'input-block-level',
    'placeholder' => $this->_model->getLabel('description'),
));

$this->submit3buttons();

$this->endWidget();