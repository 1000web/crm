<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */
?>
    <div class="row">
        <div class="btn-toolbar span2">
            <?php
            $this->buildFilterButton(TaskType::model()->getOptions(), 'tasktype');
            ?>
        </div>
    </div>
<?php
$buttons['favorite'] = array(
    'icon' => 'icon-star',
    'url'=>'Yii::app()->createUrl("task/favorite", array("del"=>$data->id))',
    'label' => $this->attributeLabels('favdel'),
);
$columns = array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'task_type_id', 'header' => $this->attributeLabels('task_type_id'), 'value' => '$data->taskType->value'),
        array('name' => 'datetime', 'header' => $this->attributeLabels('datetime'), 'value' => '$data->datetime'),
        array('name' => 'user_id', 'header' => $this->attributeLabels('user_id'), 'value' => '$data->user->username'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'buttons' => $buttons,
    'columns' => $columns,
));
