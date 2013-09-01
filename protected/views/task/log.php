<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../task/_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('task', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('task_type_id', 'datetime', 'user_id', 'value', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
