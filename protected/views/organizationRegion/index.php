<?php
/* @var $this OrganizationRegionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Регионы организаций',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Регионы огранизаций</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
