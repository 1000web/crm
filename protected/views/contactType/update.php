<?php
/* @var $this ContactTypeController */
/* @var $model ContactType */

$this->breadcrumbs = array(
    'Contact Types' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Update ContactType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>