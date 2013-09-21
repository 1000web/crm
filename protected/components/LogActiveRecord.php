<?php

class LogActiveRecord extends CActiveRecord
{
    public function save_log_record($model, $action)
    {
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

    public function getLog($id, $pagesize = 20)
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'log_datetime DESC';
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $pagesize,
            ),
        ));
    }

}