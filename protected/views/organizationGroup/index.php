<?php
/* @var $this OrganizationGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('organizationgroup', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
