<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
