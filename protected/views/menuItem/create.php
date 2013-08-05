<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

<h1>Create MenuItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>