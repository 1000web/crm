<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

<h1>Создать Меню</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>