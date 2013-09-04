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

    public function attributeLabels()
    {
        return array(
            'activkey' => 'Activkey',
            'create_at' => 'Дата создания',
            'create_time' => 'Дата создания',
            'create_user_id' => 'Кто создал',
            'contact_type_id' => 'Тип контакта',
            'customer_id' => 'Клиент',
            'datetime' => 'Дата/время',
            'deleted' => 'Удалено',
            'description' => 'Описание',
            'email' => 'Email',
            'first_name' => 'Имя',
            'id' => '#',
            'last_name' => 'Фамилия',
            'lastvisit_at' => 'Lastvisit At',
            'log_id' => 'Log #',
            'organization_id' => 'Организация',
            'organization_type_id' => 'Тип организации',
            'organization_group_id' => 'Группа организаций',
            'organization_region_id' => 'Регион',
            'password' => 'Пароль',
            'position' => 'Должность',
            'product_type_id' => 'Тип продукта',
            'status' => 'Статус',
            'superuser' => 'Суперпользователь',
            'task_type_id' => 'Тип задачи',
            'update_time' => 'Дата изменения',
            'update_user_id' => 'Кто изменил',
            'user_id' => 'Пользователь',
            'username' => 'Имя пользователя',
            'value' => 'Значение',
        );
    }


}