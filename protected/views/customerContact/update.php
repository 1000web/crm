<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs  = $this->make_breadcrumbs('update', $model);;
$this->menu         = $this->menuOperations('update', $model->id);

?>

    <h1>Update CustomerContact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>