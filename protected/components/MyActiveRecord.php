<?php

class MyActiveRecord extends CActiveRecord
{
    public function beforeSave()
    {
        if (parent::beforeSave())
        {
            $t = time();
            $u = Yii::app()->user->id;
            $this->update_time = $t;
            $this->update_user = $u;
            if ($this->isNewRecord) {
                $this->create_time = $t;
                $this->create_user = $u;
            }
            return true;
        }
        else return false;
    }

}