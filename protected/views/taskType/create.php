<?php
/* @var $this TaskTypeController */
/* @var $model TaskType */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Тип задач</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>