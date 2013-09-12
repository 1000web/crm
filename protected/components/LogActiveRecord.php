<?php

class LogActiveRecord extends CActiveRecord
{
    public function save_log_record($model, $action) {
        // список атрибутов таблицы с логами
        $list = $this->attributeNames();
        // не копируем атрибут log_id, он присвоится автоматически
        unset($list[array_search('log_id', $list)]);
        $this->setAttributes($model->getAttributes($list));
        $this->setAttributes(array(
            'log_action' => $action,
            'log_datetime' => time(),
            'log_user_id' => Yii::app()->user->id,
        ));
        $this->save();
    }
}