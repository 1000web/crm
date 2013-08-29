<?php
/* @var $this KbController */
/* @var $model Kb */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kb-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kb-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'state',
		'question',
		'answer',
		'value',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
