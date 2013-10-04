<?php
/* @var $this DealStageController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'dealstage';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, DealStage::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
