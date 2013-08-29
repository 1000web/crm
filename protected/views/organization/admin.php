<?php
/* @var $this OrganizationController */
/* @var $model Organization */

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

echo $this->manage_search_form($model);

$this->buttons = $this->columns = array();

$this->addButtons('organization', array('view','update','delete'));
$this->addColumns(array(
    'organization_type_id',
    'organization_group_id',
    'organization_region_id',
    'value',
));
echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $model->search(),
));

/*
    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'organization-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'organization_type_id',
        'organization_group_id',
        'organization_region_id',
        'value',
        'description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); */
