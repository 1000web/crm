<?php
/* @var $this ContactTypeController */
/* @var $model ContactType */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Тип Контактов</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>