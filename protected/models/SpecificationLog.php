<?php

/**
 * This is the model class for table "{{specification_log}}".
 *
 * The followings are the available columns in table '{{specification_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $deal_id
 * @property string $value
 * @property string $description
 */
class SpecificationLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SpecificationLog the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{specification_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('log_datetime, log_user_id, id, deal_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, deal_id, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
        );
    }

    public function getAll($userProfile, $id)
    {
        $criteria = new CDbCriteria;

        $criteria->order = 'log_datetime DESC';
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->specification_pagesize,
            ),
        ));
    }

}