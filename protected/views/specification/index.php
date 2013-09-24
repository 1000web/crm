<?php
/* @var $this SpecificationController */
/* @var $dataProvider CActiveDataProvider */


$controller = 'specification';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Specification::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
