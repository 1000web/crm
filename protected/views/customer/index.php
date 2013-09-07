<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();

$this->addButtons('customer', array('view', 'update', 'delete', 'log'));

if($this->id != 'organization') $this->addColumn('organization_id');
$this->addColumns(array('value', 'position', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
