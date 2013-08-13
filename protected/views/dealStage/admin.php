<?php
/* @var $this DealStageController */
/* @var $model DealStage */

if (!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#deal-stage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'deal-stage-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'prior',
        'value',
        'description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));