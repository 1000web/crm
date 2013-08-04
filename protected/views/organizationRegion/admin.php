<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

$this->breadcrumbs = array(
    'Organization Regions' => array('index'),
    'Manage',
);

$this->menu = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#organization-region-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Organization Regions</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'organization-region-grid',
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
