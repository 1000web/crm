<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs = array(
    'Organization Contacts' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update OrganizationContact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>