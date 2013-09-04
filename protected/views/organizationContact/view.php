<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$attr = array(
    array('name' => 'organization_id', 'label' => 'Организация', 'value' => $model->organization->value),
    array('name' => 'contact_type_id', 'label' => 'Тип контакта', 'value' => $model->contactType->value),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
