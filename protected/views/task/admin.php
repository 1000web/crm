<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs  = $this->make_breadcrumbs('admin');
$this->menu         = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#task-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Задачами</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'task-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'task_type_id',
        /*
        'datetime',
        'user_id',
        'value',
        'description',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
