<?php
/* @var $this CustomerContactController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контакты Клиентов',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span10">
    <tr>
        <td class="span2">
            <img src="/images/customer-150x150.jpg" />
        </td>
        <td class="span8">
            <h1>Контакты Клиентов</h1>
            <p>Упорядочивайте контакты Клиентов</p>
        </td>
    </tr>
</table>

<?php
/**/
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'customer_id', 'header' => '#'),
        array('name' => 'customer_lastname', 'header' => 'Фамилия', 'value' => '$data->customer->lastname'),
        array('name' => 'customer_firstname', 'header' => 'Имя', 'value' => '$data->customer->firstname'),
        //array('name' => 'customer_id', 'header' => 'Клиент', 'value' => '$data->customer->lastname' . ' ' . '$data->customer->firstname'),
        array('name' => 'contact_type_id', 'header' => 'Тип контакта', 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => 'Значение'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
            //'template'=>'{view} {update} {delete}',
        )
    ),
));
/**/
?>