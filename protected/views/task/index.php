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


<?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('task_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->task_type_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('datetime')); ?>:</b>
    <?php echo CHtml::encode($data->datetime); ?>
    <br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />
  /**/ ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => '#'),
        array('name' => 'task_type_id', 'header' => 'Тип задачи', 'value' => '$data->taskType->value'),
        array('name' => 'datetime', 'header' => 'Дата/время', 'value' => '$data->datetime'),
        array('name' => 'user_id', 'header' => 'Тип задачи', 'value' => '$data->user->value'),
        array('name' => 'value', 'header' => 'Значение'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>
