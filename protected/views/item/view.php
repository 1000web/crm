<?php
/* @var $this ItemController */
/* @var $this->_model Item */

$attr = array(
    array('name' => 'module', 'label' => 'Module'),
    array('name' => 'controller', 'label' => 'Controller'),
    array('name' => 'action', 'label' => 'Action'),
    array('name' => 'url', 'label' => 'Url'),
    array('name' => 'title', 'label' => 'Title'),
    array('name' => 'h1', 'label' => 'H1'),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'description', 'label' => 'Описание'),
);
if (MyHelper::checkAccess($this->id, 'log')) $attr = CMap::mergeArray(
    $this->created_updated($this->_model),
    $attr
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $this->_model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
