<?php
/* @var $this OrganizationController */
/* @var $model Organization */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#organization-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$columns = array(
    array('name'=>'organization_type_id', 'header' => $this->attributeLabels('organization_type_id'), 'value' => '$data->organizationType->value'),
    array('name'=>'organization_group_id', 'header' => $this->attributeLabels('organization_group_id'), 'value' => '$data->organizationGroup->value'),
    array('name'=>'organization_region_id', 'header' => $this->attributeLabels('organization_group_id'), 'value' => '$data->organizationRegion->value'),
    array('name'=>'value', 'header' => $this->attributeLabels('value')),
);
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $model->search(),
    'columns' => $columns,
));

/*
    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'organization-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'organization_type_id',
        'organization_group_id',
        'organization_region_id',
        'value',
        'description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); */
