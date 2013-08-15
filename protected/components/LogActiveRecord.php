<?php

class LogActiveRecord extends CActiveRecord
{
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $this->log_datetime = time();
            $this->log_user_id = Yii::app()->user->id;
            return true;
        } else return false;
    }
}