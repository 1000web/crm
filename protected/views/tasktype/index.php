<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'tasktype';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, TaskType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
