<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Organizations' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update Organization <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>