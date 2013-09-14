<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'kb';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Kb::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
