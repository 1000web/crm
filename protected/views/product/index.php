<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'product';
$this->columnLabels($controller);
if($this->getAction()->getId() != 'search' AND !isset($no_filter_buttons)) $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Product::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
