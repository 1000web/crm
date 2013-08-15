<?php
/* @var $this TaskStageController */
/* @var $model TaskStage */

if (!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#task-stage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

echo $this->manage_search_form($model);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'task-stage-grid',
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