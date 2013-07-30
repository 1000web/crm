<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Organizations' => array('index'),
    $model->id,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1>View Organization #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'organization_type_id',
        'organization_group_id',
        'organization_region_id',
        'value',
        'description',
    ),
)); ?>
