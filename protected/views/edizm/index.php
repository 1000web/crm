<?php
/* @var $this EdizmController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'edizm';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Edizm::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
