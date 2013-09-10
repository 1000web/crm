<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('../customercontact/_filter_buttons');

$this->buttons = $this->columns = array();

$this->addButtons('customercontact', array('view', 'update', 'delete', 'log'));

$this->addColumns($this->getColumns('customercontact_columns',CustomerContact::model()->getAvailableColumns()));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
