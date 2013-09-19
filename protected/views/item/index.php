<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'item';
$this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Item::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
