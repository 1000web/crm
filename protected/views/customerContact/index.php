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
        array('name' => 'customer_id', 'header' => $this->attributeLabels('id')),
        array('name' => 'customer_lastname', 'header' => $this->attributeLabels('lastname'), 'value' => '$data->customer->lastname'),
        array('name' => 'customer_firstname', 'header' => $this->attributeLabels('firstname'), 'value' => '$data->customer->firstname'),
        //array('name' => 'customer_id', 'header' => 'Клиент', 'value' => '$data->customer->lastname' . ' ' . '$data->customer->firstname'),
        array('name' => 'contact_type_id', 'header' => $this->attributeLabels('contact_type'), 'value' => '$data->contactType->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
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