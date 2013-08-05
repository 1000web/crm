<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Тип Продукции</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>