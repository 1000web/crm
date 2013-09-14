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

    public function getOptions($id = 'id', $value = 'value', $order = NULL, $params = NULL)
    {
        $criteria = new CDbCriteria;

        if ($order === NULL) {
            if (!is_array($value)) $order = $value;
            else $order = $id;
        }
        $criteria->order = 't.' . $order;
        //$criteria->group = $id;
        $criteria->distinct = true;

        if ($params !== NULL) {
            $i = 0;
            foreach ($params as $key => $val) {
                if (in_array($val, $this->getAllowedRange($key))) {
                    $criteria->addCondition($key . '=:param' . $i);
                    $criteria->params[':param' . $i] = $val;
                }
                $i++;
            }
        }
        $items = $this->findAll($criteria);

        $ret = array();
        foreach ($items as $item) {
            if (is_array($value)) $ret[$item[$id]] = $item[$value['key']][$value['val']];
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

    public function getAvailableAttributes()
    {
        return array('id', 'value', 'description');
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
        switch ($state) {
            case 1:
                return 'Неактивна';
                break;
            case 2:
                return 'Активна';
                break;
        }
        return 'Неизвестно';
    }

    public function getAllowedState()
    {
        return array(1, 2);
    }

    public function attributeLabels()
    {
        return MyHelper::labels();
    }

    public function getLabel($key)
    {
        $labels = $this->attributeLabels();
        if (isset($labels[$key])) return $labels[$key];
        return 'НЕИЗВЕСТНО';
    }

    public function getAttributeValue($attribute)
    {
        $value = MyHelper::getValue($attribute, '$this');
        return $this->evaluateExpression($value);
    }


}