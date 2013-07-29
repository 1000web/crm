<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

$this->breadcrumbs=array(
	'Organization Regions'=>array('index'),
	'Create',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Create OrganizationRegion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>