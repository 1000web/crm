<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'menu';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Menu::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
