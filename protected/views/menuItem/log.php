<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();
$this->addColumns(array('log_datetime', 'log_user_id'));
$this->addColumns(array('menu_id', 'id', 'parent_id', 'prior', 'visible'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
