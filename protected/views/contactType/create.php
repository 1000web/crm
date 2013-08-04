<?php
/* @var $this ContactTypeController */
/* @var $model ContactType */

$this->breadcrumbs = array(
    'Типы Контактов' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Тип Контактов</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>