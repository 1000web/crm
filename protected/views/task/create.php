<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Задачу</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>