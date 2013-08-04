<?php
/* @var $this OrganizationGroupController */
/* @var $model OrganizationGroup */

$this->breadcrumbs = array(
    'Группы Организаций' => array('index'),
    $model->value,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
?>
