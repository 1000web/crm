<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Клиенты',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span10">
    <tr>
        <td class="span2">
            <img src="/images/customer-150x150.jpg" />
        </td>
        <td class="span8">
            <h1>Клиенты</h1>
            <p>Клиенты - это люди в компании, с которыми вы общаетесь и взаимодействуете в рамках достижения бизнес-задач.</p>
        </td>
    </tr>
</table>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'organization_id', 'header' => '#'),// 'value' => 'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))),
        array('name' => 'organization', 'header' => 'Организация', 'value' => '$data->organization->value'),
        /*
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'Yii::app()->createUrl("organization/view", array("id"=>$data->organization_id))',
                ),
            ),
            'htmlOptions'=>array(
                'style'=>'width: 5px',
            ),
        ),/**/
        array('name' => 'lastname', 'header' => 'Фамилия'),
        array('name' => 'firstname', 'header' => 'Имя'),
        array('name' => 'position', 'header' => 'Должность'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
            //'template'=>'{view} {update} {delete}',
            /*
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/view", array("id"=>$data->id))',
                ),
                'update' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/update", array("id"=>$data->id))',
                ),
                'delete' => array
                (
                    'url'=>'Yii::app()->createUrl("customer/delete", array("id"=>$data->id))',
                ),
            ),/**/
        )
    ),
)); ?>
