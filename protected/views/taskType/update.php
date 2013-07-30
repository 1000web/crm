<?php
/* @var $this TaskTypeController */
/* @var $model TaskType */

$this->breadcrumbs = array(
    'Справочники' => 'glossary',
    'Типы задач' => array('index'),
    $model->value => array('view', 'id' => $model->id),
    'Изменить',
);

$this->menu = $this->menuOperations('update', $model->id);

?>

    <h1>Изменить <?php echo $model->value; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>