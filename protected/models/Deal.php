<?php

/**
 * This is the model class for table "{{deal}}".
 *
 * The followings are the available columns in table '{{deal}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property string $inner_number
 * @property string $external_number
 * @property string $value
 * @property string $description
 * @property integer $owner_id
 * @property integer $deal_source_id
 * @property integer $deal_stage_id
 * @property string $amount
 * @property integer $probability
 * @property string $open_date
 * @property string $close_date

 * @property integer $organization_zakaz_id
 * @property integer $organization_gruz_id
 * @property integer $organization_pay_id
 * @property integer $organization_end_id
 * @property integer $organization_post_id

 * @property integer $customer_zakaz_id
 * @property integer $customer_gruz_id
 * @property integer $customer_pay_id
 * @property integer $customer_end_id
 * @property integer $customer_post_id

 * The followings are the available model relations:
 * @property Users $create_user
 * @property Users $update_user
 * @property Users $owner
 * @property Organization $organization_zakaz
 * @property Organization $organization_gruz
 * @property Organization $organization_pay
 * @property Organization $organization_end
 * @property Organization $organization_post

 * @property DealSource $deal_source
 * @property DealStage $deal_stage
 * @property Users[] $fav_users
 */
class Deal extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Deal the static model class
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
        return '{{deal}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, owner_id,
            customer_zakaz_id, customer_gruz_id, customer_pay_id, customer_end_id, customer_post_id,
            organization_zakaz_id, organization_gruz_id, organization_pay_id, organization_end_id, organization_post_id,
            deal_source_id, deal_stage_id, probability', 'numerical', 'integerOnly' => true),
            array('inner_number, external_number, value', 'length', 'max' => 255),
            array('amount', 'length', 'max' => 12),
            array('description, open_date, close_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, inner_number, external_number, value, description, owner_id,
            customer_zakaz_id, customer_gruz_id, customer_pay_id, customer_end_id, customer_post_id,
            organization_gruz_id, organization_pay_id, organization_end_id, organization_post_id, customer_id,
            deal_source_id, deal_stage_id, amount, probability, open_date, close_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            'deal_source' => array(self::BELONGS_TO, 'DealSource', 'deal_source_id'),
            'deal_stage' => array(self::BELONGS_TO, 'DealStage', 'deal_stage_id'),
            'payments' => array(self::HAS_MANY, 'Payment', 'deal_id'),

            'customer_zakaz' => array(self::BELONGS_TO, 'Customer', 'customer_zakaz_id'),
            'customer_gruz' => array(self::BELONGS_TO, 'Customer', 'customer_gruz_id'),
            'customer_pay' => array(self::BELONGS_TO, 'Customer', 'customer_pay_id'),
            'customer_end' => array(self::BELONGS_TO, 'Customer', 'customer_end_id'),
            'customer_post' => array(self::BELONGS_TO, 'Customer', 'customer_post_id'),

            'organization_zakaz' => array(self::BELONGS_TO, 'Organization', 'organization_zakaz_id'),
            'organization_gruz' => array(self::BELONGS_TO, 'Organization', 'organization_gruz_id'),
            'organization_pay' => array(self::BELONGS_TO, 'Organization', 'organization_pay_id'),
            'organization_end' => array(self::BELONGS_TO, 'Organization', 'organization_end_id'),
            'organization_post' => array(self::BELONGS_TO, 'Organization', 'organization_post_id'),

            //'fav_users' => array(self::MANY_MANY, 'Users', '{{deal_fav}}(id, user_id)'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('deal');
    }

    public function getAvailableAttributes()
    {
        return array(
            'id', 'inner_number', 'external_number', 'open_date', 'close_date',
            'deal_source_id', 'deal_stage_id', 'amount', 'probability', 'owner_id',
            'organization_zakaz_id', 'organization_gruz_id', 'organization_pay_id', 'organization_end_id', 'organization_post_id',
            'customer_zakaz_id', 'customer_gruz_id', 'customer_pay_id', 'customer_end_id', 'customer_post_id',
            'value', 'description',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('inner_number', $this->inner_number, true);
        $criteria->compare('external_number', $this->external_number, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('owner_id', $this->owner_id);

        $criteria->compare('organization_zakaz_id', $this->organization_zakaz_id);
        $criteria->compare('organization_gruz_id', $this->organization_gruz_id);
        $criteria->compare('organization_pay_id', $this->organization_pay_id);
        $criteria->compare('organization_end_id', $this->organization_end_id);
        $criteria->compare('organization_post_id', $this->organization_post_id);

        $criteria->compare('customer_zakaz_id', $this->customer_zakaz_id);
        $criteria->compare('customer_gruz_id', $this->customer_gruz_id);
        $criteria->compare('customer_pay_id', $this->customer_pay_id);
        $criteria->compare('customer_end_id', $this->customer_end_id);
        $criteria->compare('customer_post_id', $this->customer_post_id);

        $criteria->compare('deal_source_id', $this->deal_source_id);
        $criteria->compare('deal_stage_id', $this->deal_stage_id);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('probability', $this->probability);
        $criteria->compare('open_date', $this->open_date, true);
        $criteria->compare('close_date', $this->close_date, true);

        return $this->getByCriteria($criteria);
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('deal_stage');
        switch ($select) {
            case 'favorite':
                $criteria->join = 'LEFT JOIN {{deal_fav}} j ON j.id=t.id';
                $criteria->condition = 'j.user_id=:userid';
                $criteria->params = array(':userid' => Yii::app()->user->id);
                break;
            case 'organization_zakaz_id':
                $criteria->condition = 'organization_zakaz_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
            case 'organization_gruz_id':
                $criteria->condition = 'organization_gruz_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
            case 'organization_pay_id':
                $criteria->condition = 'organization_pay_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
            case 'organization_end_id':
                $criteria->condition = 'organization_end_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
            case 'organization_post_id':
                $criteria->condition = 'organization_post_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
            case 'customer_zakaz_id':
                $criteria->condition = 'customer_zakaz_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
            case 'customer_gruz_id':
                $criteria->condition = 'customer_gruz_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
            case 'customer_pay_id':
                $criteria->condition = 'customer_pay_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
            case 'customer_end_id':
                $criteria->condition = 'customer_end_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
            case 'customer_post_id':
                $criteria->condition = 'customer_post_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
        }
        if ($userProfile->filter_deal_stage_id) {
            $criteria->addCondition('deal_stage_id=:stage');
            $criteria->params[':stage'] = $userProfile->filter_deal_stage_id;
        }
        if ($userProfile->filter_deal_source_id) {
            $criteria->addCondition('deal_source_id=:source');
            $criteria->params[':source'] = $userProfile->filter_deal_source_id;
        }
        if ($userProfile->filter_deal_status) {
            $criteria->addCondition('deal_stage.state=:state');
            $criteria->params[':state'] = $userProfile->filter_deal_status;
        }
        if ($userProfile->filter_deal_probability) {
            $criteria->addCondition('probability=:probability');
            $criteria->params[':probability'] = $userProfile->filter_deal_probability;
        }
        return $this->getByCriteria($criteria, $userProfile->deal_pagesize);
    }

}