<?php
/* @var $this OrganizationRegionController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('organizationregion', array('view', 'update', 'delete', 'log'));
$this->addColumns($this->getColumns('organizationregion_columns',OrganizationRegion::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
