<?php
/* @var $this TaskController */
/* @var $this->_model Task */

/*
$this->addAttribute('task_type_id', $model->task_type->value);
$this->addAttribute('task_stage_id', $model->task_stage->value);
$this->addAttribute('task_prior_id', $model->task_prior->value);
$this->addAttribute('datetime', $model->datetime);
$this->addAttribute('date', $model->date);
$this->addAttribute('time', $model->time);
$this->addAttribute('owner_id', $model->owner->username);
$this->addAttribute('user_id', $model->user->username);
$this->addAttribute('value', $model->value);
$this->addAttribute('description', $model->description);
/**/
$this->addAttributes(array(
    'task_type_id',
    'task_stage_id',
    'task_prior_id',
    'datetime',
    'date',
    'time',
    'owner_id',
    'user_id',
    'value',
    'description'
));


echo $this->renderPartial('../detail_view', array(
    'data' => $this->_model,
));

