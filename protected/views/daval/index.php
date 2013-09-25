<?php
/* @var $this DavalController */
/* @var $dataProvider CActiveDataProvider */


$controller = 'daval';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Daval::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
