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
 * @property integer $organization_id
 * @property integer $customer_id
 * @property integer $deal_source_id
 * @property integer $deal_stage_id
 * @property string $amount
 * @property integer $probability
 * @property string $open_date
 * @property string $close_date
 *
 * The followings are the available model relations:
 * @property Users $create_user
 * @property Users $update_user
 * @property Users $owner
 * @property Organization $organization
 * @property Customer $customer
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value, owner_id', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, owner_id, organization_id, customer_id, deal_source_id, deal_stage_id, probability', 'numerical', 'integerOnly' => true),
            array('inner_number, external_number, value', 'length', 'max' => 255),
            array('amount', 'length', 'max' => 12),
            array('description, open_date, close_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, inner_number, external_number, value, description, owner_id, organization_id, customer_id, deal_source_id, deal_stage_id, amount, probability, open_date, close_date', 'safe', 'on' => 'search'),
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
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'deal_source' => array(self::BELONGS_TO, 'DealSource', 'deal_source_id'),
            'deal_stage' => array(self::BELONGS_TO, 'DealStage', 'deal_stage_id'),
            'fav_users' => array(self::MANY_MANY, 'Users', '{{deal_fav}}(id, user_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_user_id' => 'Create User',
            'update_user_id' => 'Update User',
            'inner_number' => 'Inner Number',
            'external_number' => 'External Number',
            'value' => 'Value',
            'description' => 'Description',
            'owner_id' => 'Owner',
            'organization_id' => 'Organization',
            'customer_id' => 'Customer',
            'deal_source_id' => 'Deal Source',
            'deal_stage_id' => 'Deal Stage',
            'amount' => 'Amount',
            'probability' => 'Probability',
            'open_date' => 'Open Date',
            'close_date' => 'Close Date',
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
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('create_user_id', $this->create_user_id);
        $criteria->compare('update_user_id', $this->update_user_id);
        $criteria->compare('inner_number', $this->inner_number, true);
        $criteria->compare('external_number', $this->external_number, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('owner_id', $this->owner_id);
        $criteria->compare('organization_id', $this->organization_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('deal_source_id', $this->deal_source_id);
        $criteria->compare('deal_stage_id', $this->deal_stage_id);
        $criteria->compare('amount', $this->amount, true);
        $criteria->compare('probability', $this->probability);
        $criteria->compare('open_date', $this->open_date, true);
        $criteria->compare('close_date', $this->close_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        switch($select) {
            case 'favorite':
                $criteria->join = 'LEFT JOIN {{deal_fav}} j ON j.id=t.id';
                $criteria->condition = 'j.user_id=:userid';
                $criteria->params = array(':userid' => Yii::app()->user->id);
                break;
            case 'customer_id':
                $criteria->condition = 'customer_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
            case 'organization_id':
                $criteria->condition = 'organization_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
        }
        if ($stage = $userProfile->filter_dealstage) {
            $criteria->addCondition('deal_stage_id=:stage');
            $criteria->params[':stage'] = $stage;
        }
        if ($source = $userProfile->filter_dealsource) {
            $criteria->addCondition('deal_source_id=:source');
            $criteria->params[':source'] = $source;
        }
        return new CActiveDataProvider('Deal', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->deal_pagesize,
            ),
        ));
    }

}