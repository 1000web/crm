<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs = array(
    'Контакты Организаций' => array('index'),
    $model->value => array('view', 'id' => $model->id),
    'Редактировать',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1><?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>