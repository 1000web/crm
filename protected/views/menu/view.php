<?php
/* @var $this MenuController */
/* @var $model Menu */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = array(
//        array('name' => 'value', 'label' => 'Значение'),
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