<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs = array(
    'Контакты клиентов' => array('index'),
    'Управление',
);

$this->menu = $this->menuOperations('admin');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление Контактами Клиентов Customer Contacts</h1>

<?php echo $this->manage_search_form($model); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'customer-contact-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'create_time',
        'update_time',
        'create_user_id',
        'update_user_id',
        'contact_type_id',
        /*
        'customer_id',
        'value',
        'description',
        */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
