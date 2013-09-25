<?php
/* @var $this OrganizationGroupController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'organizationgroup';
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, OrganizationGroup::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
