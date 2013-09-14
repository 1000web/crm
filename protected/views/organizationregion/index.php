<?php
/* @var $this OrganizationRegionController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'organizationregion';
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, OrganizationRegion::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
