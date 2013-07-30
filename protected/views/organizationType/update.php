<?php
/* @var $this OrganizationTypeController */
/* @var $model OrganizationType */

$this->breadcrumbs = array(
    'Organization Types' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update OrganizationType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>