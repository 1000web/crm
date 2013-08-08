<?php
/* @var $this OrganizationController */
/* @var $model Organization */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = array(
//        array('name' => 'id', 'label' => '#'),
        //array('name' => 'organization_type_id', 'label' => 'Тип'),
        //array('name' => 'organizationType->value', 'label' => 'Тип'),
        array('name' => 'organization_type_id', 'label' => 'Тип', 'value' => $model->organizationType->value),
        array('name' => 'organization_group_id', 'label' => 'Группа', 'value' => $model->organizationGroup->value),
        array('name' => 'organization_region_id', 'label' => 'Регион', 'value' => $model->organizationRegion->value),
        //array('name' => 'value', 'label' => 'Название'),
        array('name' => 'description', 'label' => 'Описание'),
);
if($this->checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));

echo $this->renderPartial('_contact', array('dataProvider' => $contact));

echo $this->renderPartial('_customer', array('dataProvider' => $customer));