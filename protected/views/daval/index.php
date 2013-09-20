<?php
/* @var $this DavalController */
/* @var $dataProvider CActiveDataProvider */


$controller = 'daval';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Daval::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
