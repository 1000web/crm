<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->renderPartial('../menuitem/_filter_buttons');

$this->buttons = $this->columns = array();
$this->addButtons('menuitem', array('view', 'update', 'delete', 'log'));
$this->addColumns(array('menu_id', 'id', 'item_id', 'parent_id', 'prior', 'visible', 'guest_only'));
$this->addColumn('value', '$data->i->value');
$this->addColumn('controller', '$data->i->controller');
$this->addColumn('action', '$data->i->action');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
));
