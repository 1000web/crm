<?php
/* @var $this OrganizationGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Organization Groups',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Organization Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
