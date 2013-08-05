<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать продукт</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>