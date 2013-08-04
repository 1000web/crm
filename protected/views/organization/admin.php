<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Организации' => array('index'),
    'Управление',
);

$this->menu = $this->menuOperations('admin');

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
?>

<h1>Управление Организациями</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
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
)); ?>

