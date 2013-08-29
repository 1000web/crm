<?php

class LogActiveRecord extends CActiveRecord
{
    public function save_log_record($model, $action) {
        $model->unsetAttributes(array('create_time', 'update_time', 'create_user_id', 'update_user_id'));
        $this->attributes = $model->attributes;
        $this->log_action = $action;
        $this->log_datetime = time();
        $this->log_user_id = Yii::app()->user->id;
        $this->save();
    }
}