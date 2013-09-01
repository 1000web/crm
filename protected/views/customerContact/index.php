<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../customercontact/_filter_buttons');

$this->buttons = $this->columns = array();

if ($this->checkAccess('customer', 'view')) {
    $this->buttons['list'] = array(
        'icon' => 'icon-list',
        'url' => 'Yii::app()->createUrl("customer/view", array("id"=>$data->customer_id))',
        'label' => $this->attributeLabels('customer_id'),
    );
}
$this->addButtons('customercontact', array('view', 'update', 'delete', 'log'));

$this->addColumns(array('customer_id', 'contact_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
