<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

$this->breadcrumbs = array(
    'Organization Regions' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update OrganizationRegion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>