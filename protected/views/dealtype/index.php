<?php
/* @var $this DealTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'dealtype';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, DealType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
