<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$controller = 'organizationcontact';
if($this->getAction()->getId() != 'search') $this->renderPartial('../' . $controller . '/_filter_buttons');
$this->addButtons($controller, array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns($controller, OrganizationContact::model()->getAvailableAttributes()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
