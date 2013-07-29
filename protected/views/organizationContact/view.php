<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs=array(
	'Organization Contacts'=>array('index'),
	$model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View OrganizationContact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'create_time',
		'update_time',
		'create_user_id',
		'update_user_id',
		'organization_id',
		'contact_type_id',
		'value',
		'description',
	),
)); ?>
