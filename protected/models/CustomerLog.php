<?php

/**
 * This is the model class for table "{{customer_log}}".
 *
 * The followings are the available columns in table '{{customer_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $organization_id
 * @property integer $user_id
 * @property string $position
 * @property string $value
 * @property string $description
 */
class CustomerLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerLog the static model class
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
        return '{{customer_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, organization_id, user_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('position, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, organization_id, user_id, position, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
        );
    }
}