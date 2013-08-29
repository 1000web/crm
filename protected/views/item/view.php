<?php
/* @var $this ItemController */
/* @var $model Item */

$attr = array(
        array('name' => 'module', 'label' => 'Module'),
        array('name' => 'controller', 'label' => 'Controller'),
        array('name' => 'action', 'label' => 'Action'),
        array('name' => 'title', 'label' => 'Title'),
        array('name' => 'h1', 'label' => 'H1'),
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
);
if($this->checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
