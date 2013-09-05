<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$attr = array(
    array('name' => 'parent_id', 'label' => 'Parent'),
    array('name' => 'menu_id', 'label' => 'Menu'),
    array('name' => 'item_id', 'label' => 'Item'),
    array('name' => 'prior', 'label' => 'Prior'),
    array('name' => 'visible', 'label' => 'visible'),
    array('name' => 'guest_only', 'label' => 'guest_only'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));

