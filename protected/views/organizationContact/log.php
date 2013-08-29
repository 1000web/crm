<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

$this->addColumns(array(
    'id',
    'organization_id',
    'contact_type_id',
    'value',
    'description',
));


echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
