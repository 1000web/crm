<?php
/* @var $this DealTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'dealtype';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, DealType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
