<?php
/* @var $this KbController */
/* @var $model Kb */

/*
$this->breadcrumbs = array(
    'Kbs' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Kb', 'url' => array('index')),
    array('label' => 'Manage Kb', 'url' => array('admin')),
);
*/?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>