<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

if (isset($_GET['cid'])) $values = Customer::model()->getOptions('id', 'value', 'value', $_GET['cid']);
else $values = Customer::model()->getOptions();
echo $form->dropDownListRow($model, 'customer_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();