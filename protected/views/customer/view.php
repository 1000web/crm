<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $contact CustomerContact */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$attr = array(
    array('name' => 'organization_id', 'label' => 'Организация', 'value' => $model->organization->value),
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

echo $this->renderPartial('_contact', array('dataProvider' => $contact));


