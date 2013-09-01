<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../organization/_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('organization', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('value', 'organization_type_id', 'organization_region_id', 'organization_group_id', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
