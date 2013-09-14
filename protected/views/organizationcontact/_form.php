<?php
/* @var $this OrganizationContactController */
/* @var $this ->_model OrganizationContact */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($this->_model);

if (isset($_GET['oid'])) $values = Organization::model()->getOptions('id', 'value', 'value', array('id' => $_GET['oid']));
else $values = Organization::model()->getOptions();
echo $form->dropDownListRow($this->_model, 'organization_id', $values, array('class' => 'input-block-level'));

echo $form->dropDownListRow($this->_model, 'contact_type_id', ContactType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

$this->submit_button();

$this->endWidget();