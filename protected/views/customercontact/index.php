<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../customercontact/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('customercontact', array('view', 'update', 'delete', 'log'));

if($this->id != 'customer') $this->addColumn('customer_id');
$this->addColumns(array('contact_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
