<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Организации' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Изменить',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Изменить <?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
    'modelType' => $modelType,
    'modelGroup' => $modelGroup,
    'modelRegion' => $modelRegion,
)); ?>