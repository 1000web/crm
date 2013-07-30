<?php
/* @var $this ProductTypeController */
/* @var $model ProductType */

$this->breadcrumbs = array(
    'Product Types' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update ProductType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>