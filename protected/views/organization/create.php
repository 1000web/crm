<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Создать Организацию</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>