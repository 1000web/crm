<?php
/* @var $this OrganizationTypeController */
/* @var $model OrganizationType */

$this->breadcrumbs = array(
    'Типы Организаций' => array('index'),
    $model->value => array('view', 'id' => $model->id),
    'Редактировать',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1><?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>