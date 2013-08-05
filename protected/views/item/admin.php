<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs=array(
	'Пункты меню'=>array('index'),
	'Управление',
);

$this->menu = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пунктами меню</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent_id',
		'module',
		'controller',
		'action',
		'title',
		'h1',
		'value',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
