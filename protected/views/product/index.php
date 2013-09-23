<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'product';
if($this->getAction()->getId() != 'search') echo $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Product::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
