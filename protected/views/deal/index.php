<?php
/* @var $this DealController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns = array(
    array('name' => 'inner_number', 'header' => $this->attributeLabels('inner_number')),
    array('name' => 'external_number', 'header' => $this->attributeLabels('external_number')),
    array('name' => 'organization_id', 'header' => $this->attributeLabels('organization_id'), 'value' => '$data->organization->value'),
    array('name' => 'customer_id', 'header' => $this->attributeLabels('customer_id'), 'value' => '$data->customer->value'),
    //array('name' => '', 'header' => $this->attributeLabels(''), 'value' => '$data->contactType->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
//    'buttons' => $buttons,
    'columns' => $columns,
));
