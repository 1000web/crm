<?php
/* @var $this KbController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = $this->columns = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('state', 'value', 'question', 'answer', 'description'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
