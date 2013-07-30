<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs = array(
    'Customers' => array('index'),
    $model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View Customer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'organization_id',
        'firstname',
        'lastname',
        'position',
        'description',
    ),
)); ?>
