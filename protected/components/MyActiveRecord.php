<?php

class MyActiveRecord extends CActiveRecord
{
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $t = time();
            $u = Yii::app()->user->id;
            $this->update_time = $t;
            $this->update_user_id = $u;
            if ($this->isNewRecord) {
                $this->create_time = $t;
                $this->create_user_id = $u;
            }
            return true;
        } else return false;
    }

    public function getOptions($id = 'id', $value = 'value')
    {
        $ret = array();
        $items = $this->findAll();
        foreach($items as $item){
            switch($value){
                case 'fullname': $ret[$item[$id]] = $item['lastname'] . ' ' . $item['firstname'];
                    break;
                default: $ret[$item[$id]] = $item[$value];
            }
        }
        return $ret;
    }

    public function getAllowedRange()
    {
        $items = $this->findAll();
        foreach($items as $item){
            $ret[] = $item['id'];
        }
        return $ret;
    }

    public function attributeLabels(){
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
            'firstname' => 'Имя',
            'first_name' => 'Имя',
            'id' => '#',
            'lastname' => 'Фамилия',
            'last_name' => 'Фамилия',
            'lastvisit_at' => 'Lastvisit At',
            'log_id' => 'Log #',
            'organization_id' => 'Организация',
            'organization_type_id' => 'Тип организации',
            'organization_group_id' => 'Группа огранизаций',
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