<?php
/* @var $this TaskPriorController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'taskprior';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, TaskPrior::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
