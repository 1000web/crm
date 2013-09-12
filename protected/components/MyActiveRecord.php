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

    public function getAvailableColumns(){
        $attributes = $this->attributeLabels();
        $ret = array();
        foreach($attributes as $key => $val) {
            $ret[] = $key;
        }
        return $ret;
    }

    public function getStateOptions()
    {
        return array(
            2 => $this->getStateName(2),
            1 => $this->getStateName(1),
        );
    }

    public function getStateName($state)
    {
        switch($state) {
            case 1: return 'Неактивна';
                break;
            case 2: return 'Активна';
                break;
        }
        return 'Неизвестно';
    }

    public function getAllowedState()
    {
        return array(1, 2);
    }

    public function attributeLabels(){
        return MyHelper::labels();
    }

    public function getAttributeLabel($key){
        $labels = $this->attributeLabels();
        if(isset($labels[$key])) return $labels[$key];
        return 'НЕИЗВЕСТНО';
    }

    public function getAttributeValue($attribute)
    {
        $datetime_template = 'Y-m-d H:i:s';
        switch ($attribute) {
            case 'organization_id' :
                $value = $this->organization->value;
                break;
            case 'organization_type_id' :
                $value = $this->organization_type->value;
                break;
            case 'organization_group_id' :
                $value = $this->organization_group->value;
                break;
            case 'organization_region_id' :
                $value = $this->organization_region->value;
                break;
            case 'log_user_id':
                $value = $this->log_user->username;
                break;
            case 'create_user_id':
                $value = $this->create_user->username;
                break;
            case 'update_user_id':
                $value = $this->update_user->username;
                break;
            case 'user_id' :
                $value = $this->user->profiles->last_name . ' ' . $this->user->firstname . '(' . $this->user->username . ')';
                break;
            //: $value =   $this->user->username; break;
            //: $value =   ($this->user_id == Yiiapp()->user->id)?'Я'$this->user->username; break;
            case 'owner_id' :
                $value = $this->owner->profiles->last_name . ' ' . $this->owner->profiles->firstname . '(' . $this->owner->username . ')';
                break;
            //: $value =   $this->owner->username; break;
            //: $value =   ($this->owner_id == Yiiapp()->user->id)?'Я'$this->owner->username; break;
            case 'customer_id':
                $value = $this->customer->value;
                break;
            case 'contact_type_id':
                $value = $this->contact_type->value;
                break;
            case 'product_type_id':
                $value = $this->product_type->value;
                break;
            case 'create_time':
                $value = date($datetime_template, $this->create_time);
                break;
            case 'update_time':
                $value = date($datetime_template, $this->update_time);
                break;
            case 'datetime':
                $value = date($datetime_template, $this->datetime);
                break;
            case 'log_datetime':
                $value = date($datetime_template, $this->log_datetime);
                break;
            case 'deal_source_id':
                $value = $this->deal_source->value;
                break;
            case 'deal_stage_id':
                $value = $this->deal_stage->value;
                break;
            case 'task_type_id':
                $value = $this->task_type->value;
                break;
            case 'task_stage_id':
                $value = $this->task_stage->value;
                break;
            case 'task_prior_id':
                $value = $this->task_prior->value;
                break;
            case 'state':
                $value = $this->getStateName($this->state);
                break;
            default:
                $value = NULL;
        }
        return $value;
    }


}