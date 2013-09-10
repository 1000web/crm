<?php
/* @var $this DealController */
/* @var $this->_model Deal */
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

echo $form->sliderRow($this->_model, 'probability', array(
    'class' => 'span11',
    'options'=>array(
        'value' => intval($this->_model->probability),
        'min' => 0,
        'max' => 100,
        'range' => false,
        //'values' => array(0, 100)
    )
));

if (isset($_GET['cid'])) $values = Customer::model()->getOptions('id', 'value', 'value', $_GET['cid']);
else $values = Customer::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'customer_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'deal_source_id', DealSource::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'deal_stage_id', DealStage::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'amount', array(
    'class' => 'span2 text-center',
    'maxlength' => 12,
    'append' => 'Руб.',
));

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->textArea($this->_model, 'value', array('rows' => 4,
    'class' => 'input-block-level',
    'placeholder' => $this->_model->getLabel('value'),
));
echo $form->textArea($this->_model, 'description', array('rows' => 4,
    'class' => 'input-block-level',
    'placeholder' => $this->_model->getLabel('description'),
));

echo $this->submit_button($this->_model->isNewRecord);

$this->endWidget();