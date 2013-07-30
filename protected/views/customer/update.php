<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs = array(
    'Customers' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update Customer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>