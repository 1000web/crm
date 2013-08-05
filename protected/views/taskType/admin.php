<?php
/* @var $this TaskTypeController */
/* @var $model TaskType */

$this->breadcrumbs  = $this->make_breadcrumbs('admin');
$this->menu         = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#task-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Типами Задач</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'task-type-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'value',
        /*
        'description',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
