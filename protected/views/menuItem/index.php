<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs  = $this->make_breadcrumbs('index');;
$this->menu         = $this->menuOperations('index');

?>

<h1>Menu Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
