<?php
/* @var $this ShippingController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'shipping';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Shipping::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
