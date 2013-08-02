<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Organizations' => array('index'),
    'Manage',
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

<?php
    echo $this->manage_search_form($model);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'organization_type_id', 'header'=>'Тип'),
        array('name'=>'organization_group_id', 'header'=>'Группа'),
        array('name'=>'organization_region_id', 'header'=>'Регион'),
        array('name'=>'value', 'header'=>'Название'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>



<?php /*
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
)); */?>
