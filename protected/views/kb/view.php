<?php
/* @var $this KbController */
/* @var $model Kb */

$attr = array(
    array('name' => 'state', 'label' => 'State'),
    array('name' => 'value', 'label' => 'Значение'),
    array('name' => 'question', 'label' => 'Question'),
    array('name' => 'answer', 'label' => 'Answer'),
    array('name' => 'description', 'label' => 'Описание'),
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
