<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Клиента</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>