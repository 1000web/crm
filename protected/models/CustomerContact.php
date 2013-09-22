<?php

/**
 * This is the model class for table "{{customer_contact}}".
 *
 * The followings are the available columns in table '{{customer_contact}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $contact_type_id
 * @property integer $customer_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Users $create_user
 * @property Users $update_user
 * @property ContactType $contact_type
 * @property Customer $customer
 */
class CustomerContact extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerContact the static model class
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
        return '{{customer_contact}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('contact_type_id, customer_id, value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, contact_type_id, customer_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, contact_type_id, customer_id, value, description', 'safe', 'on' => 'search'),
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
            'contact_type' => array(self::BELONGS_TO, 'ContactType', 'contact_type_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('customercontact');
    }

    public function getAvailableAttributes()
    {
        return array('id', 'customer_id', 'contact_type_id', 'value', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('customer', 'contact_type');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('contact_type.value', $this->contact_type_id, true);
        $criteria->compare('customer.value', $this->customer_id, true);
        $criteria->compare('t.value', $this->value, true);
        $criteria->compare('t.description', $this->description, true);

        return $this->getByCriteria($criteria);
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        switch ($select) {
            case 'customer_id':
                $criteria->condition = 'customer_id=:cid';
                $criteria->params[':cid'] = $param;
                break;
        }
        if ($userProfile->filter_contact_type_id) {
            $criteria->addCondition('contact_type_id=:type');
            $criteria->params[':type'] = $userProfile->filter_contact_type_id;
        }
        return $this->getByCriteria($criteria, $userProfile->customercontact_pagesize);
    }

}