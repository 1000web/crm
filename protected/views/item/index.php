<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../item/_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('item', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('id', 'parent_id', 'module', 'controller', 'action', 'icon', 'value', 'title'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
