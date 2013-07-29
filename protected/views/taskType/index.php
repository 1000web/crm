<?php
/* @var $this TaskTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Справочники' => 'glossary',
    'Типы задач',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Типы задач</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
