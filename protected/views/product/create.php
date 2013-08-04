<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs = array(
    'Продукция' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Продукт</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>