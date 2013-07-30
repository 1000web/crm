<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs = array(
    'Customer Contacts' => array('index'),
    'Create',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Create CustomerContact</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>