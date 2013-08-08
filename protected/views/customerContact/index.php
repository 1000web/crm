<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

if($this->checkAccess('customer', 'view')) {
    $buttons['list'] = array(
        'icon' => 'icon-list',
        'url'=>'Yii::app()->createUrl("customer/view", array("id"=>$data->customer_id))',
        'label' => $this->attributeLabels('customer_id'),
    );
}
$columns = array(
    //array('name' => 'customer_id', 'header' => $this->attributeLabels('id')),
    array('name' => 'customer_id', 'header' => $this->attributeLabels('customer_id'), 'value' => '$data->customer->value'),
    array('name' => 'contact_type_id', 'header' => $this->attributeLabels('contact_type'), 'value' => '$data->contactType->value'),
    array('name' => 'value', 'header' => $this->attributeLabels('value')),
    array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'columns' => $columns,
));
