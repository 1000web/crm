<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs = array(
    'Customer Contacts' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update CustomerContact <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>