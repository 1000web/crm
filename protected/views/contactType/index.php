<?php
/* @var $this ContactTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Types',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Contact Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
