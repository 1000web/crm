<?php
/* @var $this OrganizationTypeController */
/* @var $model OrganizationType */

$this->breadcrumbs = array(
    'Типы Организаций' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Тип Организаций</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>