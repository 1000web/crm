<?php
/* @var $this CustomerController */
/* @var $model Customer */

$fullname = $model->lastname . ' ' . $model->firstname;

$this->breadcrumbs = array(
    'Клиенты' => array('index'),
    $fullname,
);

$this->menu = $this->menuOperations('view', $model->id);

?>

<h1><?php echo $fullname; ?></h1>

<?php
$attr = CMap::mergeArray(
    $this->created_updated($model),
    array(
        array('name' => 'organization_id', 'label' => 'Организация', 'value' => $model->organization->value),
        array('name' => 'position', 'label' => 'Должность'),
        array('name' => 'description', 'label' => 'Описание'),
    )
);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => $attr,
));
?>

<h2>Контакты Клиента</h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $contact,
    'template' => "{items}",
    'columns' => array(
        //array('name' => 'id', 'header' => '#'),
        array('name' => 'contact_type_id', 'header' => 'Тип контакта', 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => 'Наименование'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'template'=>'{view} {update} {delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'Yii::app()->createUrl("customerContact/view", array("id"=>$data->id))',
                ),
                'update' => array
                (
                    'url'=>'Yii::app()->createUrl("customerContact/update", array("id"=>$data->id))',
                ),
                'delete' => array
                (
                    'url'=>'Yii::app()->createUrl("customerContact/delete", array("id"=>$data->id))',
                ),
            ),
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>


