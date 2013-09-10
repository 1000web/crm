<?php
/* @var $this OrganizationContactController */
/* @var $this->_model OrganizationContact */

$attr = array(
    array('name' => 'organization_id', 'label' => 'Организация', 'value' => $this->_model->organization->value),
    array('name' => 'contact_type_id', 'label' => 'Тип контакта', 'value' => $this->_model->contact_type->value),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($this->_model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $this->_model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
