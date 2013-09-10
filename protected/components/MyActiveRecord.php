<?php

class MyActiveRecord extends CActiveRecord
{
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $time = time();
            $user = Yii::app()->user->id;
            $this->update_time = $time;
            $this->update_user_id = $user;
            if ($this->isNewRecord) {
                $this->create_time = $time;
                $this->create_user_id = $user;
            }
            return true;
        } else return false;
    }
/*
    public function getOptions($id = 'id', $value = 'value', $order = NULL, $param = NULL)
    {
        $criteria = new CDbCriteria;

        $criteria->order = $order?$order:$value;
        $criteria->group = $id;

        if($param AND in_array($param, $this->getAllowedRange($id))) {
            $criteria->addCondition($id . '=:param');
            $criteria->params[':param'] = $param;
        }
        $items = $this->findAll($criteria);

        $ret = array();
        foreach ($items as $item) {
            $ret[$item[$id]] = $item[$value];
        }
        return $ret;
    }/**/

    public function getOptions($id = 'id', $value = 'value', $order = NULL, $param = NULL)
    {
        $criteria = new CDbCriteria;

        if($order === NULL) {
            if(!is_array($value)) $order = $value;
            else $order = $id;
        }
        $criteria->order = 't.' . $order;
        //$criteria->group = $id;
        $criteria->distinct = true;

        if($param AND in_array($param, $this->getAllowedRange($id))) {
            $criteria->addCondition($id . '=:param');
            $criteria->params[':param'] = $param;
        }
        $items = $this->findAll($criteria);

        $ret = array();
        foreach ($items as $item) {
            if(is_array($value)) $ret[$item[$id]] = $item[$value['key']][$value['val']];
            else $ret[$item[$id]] = $item[$value];
        }
        return $ret;
    }


    public function getAllowedRange($id = 'id')
    {
        $items = $this->findAll();
        $ret = array();
        foreach ($items as $item) {
            $ret[] = $item[$id];
        }
        return $ret;
    }

    function getLabel($name){
        $labels = $this->attributeLabels();
        return $labels[$name];
    }

    public function getAvailableColumns(){
        $attributes = $this->attributeLabels();
        $ret = array();
        foreach($attributes as $key => $val) {
            $ret[] = $key;
        }
        return $ret;
    }

}