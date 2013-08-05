<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs  = $this->make_breadcrumbs('update', $model);;
$this->menu         = $this->menuOperations('update', $model->id);

?>

    <h1><?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>