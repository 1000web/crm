<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

$this->breadcrumbs = array(
    'Регионы Организаций' => array('index'),
    'Create',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Регион Организаций</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>