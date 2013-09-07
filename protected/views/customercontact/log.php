<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

echo $this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('customer_id', 'contact_type_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
