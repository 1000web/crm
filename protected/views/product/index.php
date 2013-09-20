<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */


$controller = 'product';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Product::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
