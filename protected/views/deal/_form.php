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

echo $form->dropDownListRow($this->_model, 'organization_zakaz_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if(! $this->_model->isNewRecord OR $this->_model->organization_zakaz_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_zakaz_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_zakaz_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'organization_gruz_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if(! $this->_model->isNewRecord OR $this->_model->organization_gruz_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_gruz_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_gruz_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'organization_pay_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if(! $this->_model->isNewRecord OR $this->_model->organization_pay_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_pay_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_pay_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'organization_end_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if(! $this->_model->isNewRecord OR $this->_model->organization_end_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_end_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_end_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'organization_post_id', Organization::model()->getOptions(), array('class' => 'input-block-level'));
if(! $this->_model->isNewRecord OR $this->_model->organization_post_id != NULL)
    echo $form->dropDownListRow($this->_model, 'customer_post_id',
        Customer::model()->getOptions('id', 'value', 'value', array('organization_id' => $this->_model->organization_post_id), true),
        array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'deal_type_id', DealType::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

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