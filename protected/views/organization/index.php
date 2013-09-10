<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../organization/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('organization', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('organization_columns',Organization::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
