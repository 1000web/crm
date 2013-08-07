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

$this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template'=>"{items}",
    'columns'=>array(
        //array('name'=>'id', 'header'=>'#'),
        array('name'=>'organization_type_id', 'header'=>'Тип', 'value' => '$data->organizationType->value'),
        array('name'=>'organization_group_id', 'header'=>'Группа', 'value' => '$data->organizationGroup->value'),
        array('name'=>'organization_region_id', 'header'=>'Регион', 'value' => '$data->organizationRegion->value'),
        array('name'=>'value', 'header'=>'Название'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
));

/*
    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'organization-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
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
