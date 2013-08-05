<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs  = $this->make_breadcrumbs('create');
$this->menu         = $this->menuOperations('create');

?>

    <h1>Create CustomerContact</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>