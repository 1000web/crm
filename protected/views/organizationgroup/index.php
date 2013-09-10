<?php
/* @var $this OrganizationGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('organizationgroup', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('organizationgroup_columns',OrganizationGroup::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
