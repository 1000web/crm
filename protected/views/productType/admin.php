<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

$this->breadcrumbs = array(
    'Типы Продукции' => array('index'),
    'Управление',
);

$this->menu = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Типами Продукции</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-type-grid',
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
