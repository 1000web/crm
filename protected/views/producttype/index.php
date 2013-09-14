<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'producttype';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, ProductType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
