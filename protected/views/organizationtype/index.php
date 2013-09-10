<?php
/* @var $this OrganizationTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('organizationtype', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('organizationtype_columns',OrganizationType::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
