<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Customer Contacts',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Customer Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
