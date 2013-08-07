<?php
/* @var $this TaskTypeController */
/* @var $model TaskType */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
