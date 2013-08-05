<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs  = $this->make_breadcrumbs('view', $model);
$this->menu         = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'organization_id', 'label' => 'Организация', 'value' => $model->organization->value),
        array('name' => 'contact_type_id', 'label' => 'Тип контакта', 'value' => $model->contactType->value),
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
