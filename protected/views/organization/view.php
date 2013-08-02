<?php
/* @var $this OrganizationController */
/* @var $model Organization */

$this->breadcrumbs = array(
    'Организации' => array('index'),
    $model->value,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $model->value; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => array(
        array('name' => 'id', 'label' => '#'),
        array('name' => 'organization_type_id', 'label' => 'Тип'),
        array('name' => 'organizationType->value', 'label' => 'Тип'),
        array('name' => 'organization_group_id', 'label' => 'Группа'),
        array('name' => 'organization_region_id', 'label' => 'Регион'),
        //array('name' => 'value', 'label' => 'Название'),
        array('name' => 'description', 'label' => 'Описание'),
    ),
)); ?>

<h2>Контакты Организации</h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $contact,
    'template' => "{items}",
    'columns' => array(
        //array('name' => 'id', 'header' => '#'),
        array('name' => 'contact_type_id', 'header' => 'Тип контакта'),
        array('name' => 'value', 'header' => 'Наименование'),
        array('name' => 'description', 'header' => 'Описание'),
        /*array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 50px'),
        ),*/
    ),
)); ?>


<h2>Контактные лица</h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $customer,
    'template' => "{items}",
    'columns' => array(
        //array('name' => 'id', 'header' => '#'),
        array('name' => 'lastname', 'header' => 'Фамилия'),
        array('name' => 'firstname', 'header' => 'Имя'),
        array('name' => 'position', 'header' => 'Должность'),
        array('name' => 'description', 'header' => 'Описание'),
        /*array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 50px'),
        ),*/
    ),
)); ?>

