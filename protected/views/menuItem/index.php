<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('menuitem', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('menu_id', 'id', 'parent_id', 'prior', 'visible'));

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
