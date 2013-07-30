<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

$this->breadcrumbs = array(
    'Organization Groups' => array('index'),
    'Create',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Create OrganizationGroup</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>