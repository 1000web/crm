<?php
/* @var $this OrganizationContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Organization Contacts',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Organization Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
