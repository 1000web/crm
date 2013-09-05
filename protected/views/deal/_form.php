<?php
/* @var $this DealController */
/* @var $model Deal */
/* @var $form CActiveForm */

Yii::app()->bootstrap->registerAssetCss('bootstrap-datepicker.css');
Yii::app()->bootstrap->registerAssetJs('bootstrap.datepicker.js');

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

echo $form->datePickerRow($model, 'open_date');

echo $form->datePickerRow($model, 'close_date');

echo $form->textFieldRow($model, 'external_number', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textFieldRow($model, 'inner_number', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'owner_id', Users::model()->getOptions('id', 'username'), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'probability', array('class' => 'input-block-level'));

if (isset($_GET['cid'])) $values = Customer::model()->getOptions('id', 'value', 'value', $_GET['cid']);
else $values = Customer::model()->getOptions();
echo $form->dropDownListRow($model, 'customer_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'deal_source_id', DealSource::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'deal_stage_id', DealStage::model()->getOptions('id', 'value', 'prior'), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'amount', array('size' => 12, 'maxlength' => 12));

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->textAreaRow($model, 'value', array('rows' => 4, 'class' => 'input-block-level'));

echo $form->textAreaRow($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();