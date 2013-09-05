<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', $_GET['oid']);
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();