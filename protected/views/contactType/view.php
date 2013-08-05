<?php
/* @var $this ContactTypeController */
/* @var $model ContactType */

$this->breadcrumbs  = $this->make_breadcrumbs('view', $model);
$this->menu         = $this->menuOperations('view', $model->id);

?>

<h1>Тип контактов: <?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
//        array('name' => 'value', 'label' => 'Значение'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
?>
