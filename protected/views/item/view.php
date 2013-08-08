<?php
/* @var $this ItemController */
/* @var $model Item */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = array(
        array('name' => 'module', 'label' => 'Значение'),
        array('name' => 'controller', 'label' => 'Значение'),
        array('name' => 'action', 'label' => 'Значение'),
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
