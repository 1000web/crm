<?php
/* @var $this TaskStageController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'taskstage';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, TaskStage::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
