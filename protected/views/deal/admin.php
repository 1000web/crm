<?php
/* @var $this DealController */
/* @var $model Deal */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#deal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'inner_number',
		'external_number',
		'value',
		'open_date',
		'owner_id',
		'organization_id',
		'customer_id',
		'deal_source_id',
		'deal_stage_id',
		'amount',
		'probability',
		'close_date',
        'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
