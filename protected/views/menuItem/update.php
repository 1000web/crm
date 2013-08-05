<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs  = $this->make_breadcrumbs('update', $model);;
$this->menu         = $this->menuOperations('update', $model->id);

?>

<h1>Update MenuItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>