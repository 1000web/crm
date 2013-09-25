<?php
/* @var $this DealSourceController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'dealsource';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, DealSource::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
