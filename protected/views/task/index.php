<?php
/* @var $this TaskController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns = array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'task_type_id', 'header' => $this->attributeLabels('task_type_id'), 'value' => '$data->taskType->value'),
        array('name' => 'datetime', 'header' => $this->attributeLabels('datetime'), 'value' => '$data->datetime'),
        array('name' => 'user_id', 'header' => $this->attributeLabels('user_id'), 'value' => '$data->user->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns' => $columns,
));
