<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('parent_id', 'module', 'controller', 'action', 'icon', 'value', 'title'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
