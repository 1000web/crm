<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Create OrganizationContact</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>