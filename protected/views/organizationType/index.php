<?php
/* @var $this OrganizationTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Organization Types',
);

$this->menu = $this->menuOperations('index');

?>

<h1>Organization Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
