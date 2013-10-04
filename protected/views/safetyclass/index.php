<?php
/* @var $this SafetyclassController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'safetyclass';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Safetyclass::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
