<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../organizationcontact/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('organizationcontact', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('organizationcontact_columns',OrganizationContact::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
