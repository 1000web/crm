<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'product';
$this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('create', 'view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Product::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
