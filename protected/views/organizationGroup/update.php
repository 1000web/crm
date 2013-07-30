<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

$this->breadcrumbs = array(
    'Organization Groups' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update OrganizationGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>