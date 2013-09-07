<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../organizationcontact/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('organizationcontact', array('view', 'update', 'delete', 'log'));
if($this->id != 'organization') $this->addColumn('organization_id');
$this->addColumns(array('contact_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
