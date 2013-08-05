<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Задачи',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span-20">
    <tr>
        <td class="span-4">
            <img src="/images/task-150x150.jpg" />
        </td>
        <td class="span-16">
            <h1>Задачи</h1>
            <h2>Отслеживайте свои Задачи</h2>
            Задачи - перечень или реестр задач, событий и звонков, связанных с записями CRM, относящимися к различным модулям.
        </td>
    </tr>
</table>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'task_type_id', 'header' => $this->attributeLabels('task_type_id'), 'value' => '$data->taskType->value'),
        array('name' => 'datetime', 'header' => $this->attributeLabels('datetime'), 'value' => '$data->datetime'),
        array('name' => 'user_id', 'header' => $this->attributeLabels('user_id'), 'value' => '$data->user->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>
