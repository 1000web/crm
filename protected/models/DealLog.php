<?php

/**
 * This is the model class for table "{{deal_log}}".
 *
 * The followings are the available columns in table '{{deal_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property string $inner_number
 * @property string $external_number
 * @property string $value
 * @property string $soprdoc
 * @property string $insurance
 * @property string $shipping

 * @property string $description
 * @property integer $owner_id

 * @property integer $customer_zakaz_id
 * @property integer $customer_pay_id
 * @property integer $customer_post_id

 * @property integer $organization_zakaz_id
 * @property integer $organization_pay_id
 * @property integer $organization_post_id

 * @property integer $deal_source_id
 * @property integer $deal_stage_id
 * @property string $amount
 * @property integer $probability
 * @property string $open_date
 * @property string $close_date
 */
class DealLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DealLog the static model class
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
        return '{{deal_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, owner_id,
            customer_zakaz_id, customer_pay_id, customer_post_id, organization_zakaz_id, organization_pay_id, organization_post_id,
            deal_source_id, deal_stage_id, probability', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('inner_number, external_number, value, soprdoc, insurance, shipping', 'length', 'max' => 255),
            array('amount', 'length', 'max' => 12),
            array('description, open_date, close_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, inner_number, external_number, owner_id, deal_source_id, deal_stage_id,
            customer_zakaz_id, customer_pay_id, customer_post_id, organization_zakaz_id, organization_pay_id, organization_post_id,
            amount, probability, open_date, close_date, value, soprdoc, insurance, shipping, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            'deal_source' => array(self::BELONGS_TO, 'DealSource', 'deal_source_id'),
            'deal_stage' => array(self::BELONGS_TO, 'DealStage', 'deal_stage_id'),
            'customer_zakaz' => array(self::BELONGS_TO, 'Customer', 'customer_zakaz_id'),
            'customer_pay' => array(self::BELONGS_TO, 'Customer', 'customer_pay_id'),
            'customer_post' => array(self::BELONGS_TO, 'Customer', 'customer_post_id'),
            'organization_zakaz' => array(self::BELONGS_TO, 'Organization', 'organization_zakaz_id'),
            'organization_pay' => array(self::BELONGS_TO, 'Organization', 'organization_pay_id'),
            'organization_post' => array(self::BELONGS_TO, 'Organization', 'organization_post_id'),
        );
    }
}