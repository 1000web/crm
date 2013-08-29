<?php
/* @var $this ProductTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addButtons('producttype', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
