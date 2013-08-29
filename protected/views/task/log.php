<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();

$this->addColumns(array(
    'id',
    'task_type_id',
    'datetime',
    'user_id',
    'value',
    'description',
));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
