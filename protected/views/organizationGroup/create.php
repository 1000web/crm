<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Группу Организаций</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>