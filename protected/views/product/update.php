<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs = array(
    'Продукты' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Изменить',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Изменить <?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>