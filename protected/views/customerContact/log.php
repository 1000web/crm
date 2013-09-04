<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

if (MyHelper::checkAccess('customer', 'view')) {
    $this->buttons['list'] = array(
        'icon' => 'icon-list',
        'url' => 'Yii::app()->createUrl("customer/view", array("id"=>$data->customer_id))',
        'label' => $this->attributeLabels('customer_id'),
    );
}
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('customer_id', 'contact_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
