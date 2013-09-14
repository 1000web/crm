<?php
/* @var $this OrganizationTypeController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'organizationtype';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, OrganizationType::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
