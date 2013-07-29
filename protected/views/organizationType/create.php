<?php
/* @var $this OrganizationTypeController */
/* @var $model OrganizationType */

$this->breadcrumbs=array(
	'Organization Types'=>array('index'),
	'Create',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Create OrganizationType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>