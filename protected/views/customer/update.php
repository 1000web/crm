<?php
/* @var $this CustomerController */
/* @var $model Customer */

$fullname = $model->lastname . ' ' . $model->firstname;

$this->breadcrumbs = array(
    'Клиенты' => array('index'),
    $fullname => array('view', 'id' => $model->id),
    'Редактировать',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1><?php echo $fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>