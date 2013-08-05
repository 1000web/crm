<?php
/* @var $this OrganizationRegionController */
/* @var $model OrganizationRegion */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Create OrganizationRegion</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>