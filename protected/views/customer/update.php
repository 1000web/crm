<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs  = $this->make_breadcrumbs('update', $model);
$this->menu         = $this->menuOperations('update', $model->id);

?>

    <h1><?php echo $model->lastname . ' ' . $model->firstname; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>