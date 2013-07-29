<?php
/* @var $this ContactTypeController */
/* @var $model ContactType */

$this->breadcrumbs=array(
	'Contact Types'=>array('index'),
	'Create',
);

$this->menu = $this->menuOperations('create');

?>

<h1>Create ContactType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>