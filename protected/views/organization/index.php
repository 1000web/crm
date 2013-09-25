<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'organization';
if($this->getAction()->getId() != 'search') $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'copy', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, Organization::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
