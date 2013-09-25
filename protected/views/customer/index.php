<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'customer';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Customer::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));

