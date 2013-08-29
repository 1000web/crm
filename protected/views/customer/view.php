<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $contact CustomerContact */

$attr = array(
    array('name' => 'organization_id', 'label' => $this->attributeLabels('organization_id'), 'value' => $model->organization->value),
    array('name' => 'position', 'label' => $this->attributeLabels('position')),
    array('name' => 'value', 'label' => $this->attributeLabels('value')),
    array('name' => 'description', 'label' => $this->attributeLabels('description')),
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
/**/
if($this->checkAccess('customercontact', 'view'))
    echo $this->renderPartial('_contact', array(
    'dataProvider' => $contact,
    'model' => $model,
));/**/
/*
if($this->checkAccess('customercontact', 'view'))
    echo $this->renderPartial('../customercontact/_index', array(
    'dataProvider' => $contact,
    'model' => $model,
));/**/

if($this->checkAccess('deal', 'view'))
    echo $this->renderPartial('_deal', array(
    'dataProvider' => $deal,
    'model' => $model,
));


