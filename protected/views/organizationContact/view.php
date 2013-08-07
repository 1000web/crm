<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'organization_id', 'label' => 'Организация', 'value' => $model->organization->value),
        array('name' => 'contact_type_id', 'label' => 'Тип контакта', 'value' => $model->contactType->value),
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
