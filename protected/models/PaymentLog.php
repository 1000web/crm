<?php

/**
 * This is the model class for table "{{payment_log}}".
 *
 * The followings are the available columns in table '{{payment_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $payment_type_id
 * @property integer $deal_id
 * @property string $plan_date
 * @property string $real_date
 * @property string $amount
 * @property string $value
 * @property string $description
 */
class PaymentLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PaymentLog the static model class
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
        return '{{payment_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, payment_type_id, deal_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('amount', 'length', 'max' => 15),
            array('plan_date, real_date', 'length', 'max' => 10),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, payment_type_id, deal_id, plan_date, real_date, amount, value, description', 'safe', 'on' => 'search'),
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
            'payment_type' => array(self::BELONGS_TO, 'PaymentType', 'payment_type_id'),
        );
    }

}