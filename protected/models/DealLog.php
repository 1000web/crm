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
 * @property string $description
 * @property integer $owner_id
 * @property integer $performer_id
 * @property integer $organization_id
 * @property integer $customer_id
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('log_datetime, log_user_id, id, owner_id, performer_id, organization_id, customer_id, deal_source_id, deal_stage_id, probability', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('inner_number, external_number, value', 'length', 'max' => 255),
            array('amount', 'length', 'max' => 12),
            array('description, open_date, close_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, inner_number, external_number, value, description, owner_id, performer_id, organization_id, customer_id, deal_source_id, deal_stage_id, amount, probability, open_date, close_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            'performer' => array(self::BELONGS_TO, 'Users', 'performer_id'),
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'deal_source' => array(self::BELONGS_TO, 'DealSource', 'deal_source_id'),
            'deal_stage' => array(self::BELONGS_TO, 'DealStage', 'deal_stage_id'),
        );
    }

    public function getAll($userProfile, $id)
    {
        $criteria = new CDbCriteria;

        $criteria->order = 'log_datetime DESC';
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;

        return new CActiveDataProvider('DealLog', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->deal_pagesize,
            ),
        ));
    }

}