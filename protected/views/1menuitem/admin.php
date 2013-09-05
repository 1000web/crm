<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'menu-item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'parent_id',
        /*
        'menu_id',
        'item_id',
        'prior',
        'visible',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));