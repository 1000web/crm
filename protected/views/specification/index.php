<?php
/* @var $this SpecificationController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'specification';
$this->columnLabels($controller);
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Specification::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
