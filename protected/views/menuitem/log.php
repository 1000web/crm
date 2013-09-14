<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->buttons = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('menu_id', 'id', 'parent_id', 'prior', 'visible'), true);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
