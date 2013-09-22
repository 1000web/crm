<?php

/**
 * This is the model class for table "{{customer}}".
 *
 * The followings are the available columns in table '{{customer}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $organization_id
 * @property integer $user_id
 * @property string $position
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Organization $organization
 * @property Users $create_user
 * @property Users $update_user
 * @property Users $user
 * @property CustomerContact[] $customer_contacts
 * @property Users[] $fav_users
 * @property Deal[] $deals
 */
class Customer extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Customer the static model class
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
        return '{{customer}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, organization_id, user_id', 'numerical', 'integerOnly' => true),
            array('position, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, organization_id, user_id, position, value, description', 'safe', 'on' => 'search'),
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
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            //'fav_users' => array(self::MANY_MANY, 'Users', '{{customer_fav}}(id, user_id)'),
            'contacts' => array(self::HAS_MANY, 'CustomerContact', 'customer_id'),
            'deals' => array(self::HAS_MANY, 'Deal', 'customer_id'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('customer');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('organization');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('organization.value', $this->organization_id, true);
        $criteria->compare('t.position', $this->position, true);
        $criteria->compare('t.value', $this->value, true);
        $criteria->compare('t.description', $this->description, true);
        $criteria->compare('t.user_id', $this->user_id);

        return $this->getByCriteria($criteria);
    }

    public function getAvailableAttributes()
    {
        return array('id', 'value', 'position', 'organization_id', 'description', 'user_id');
    }

    public function getAll($userProfile, $select = '', $param = NULL)
    {
        $criteria = new CDbCriteria;
        switch ($select) {
            case 'favorite':
                $criteria->join = 'LEFT JOIN {{customer_fav}} j ON j.id=t.id';
                $criteria->condition = 'j.user_id=:userid';
                $criteria->params = array(':userid' => Yii::app()->user->id);
                break;
            case 'organization_id':
                $criteria->condition = 'organization_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
        }
        return $this->getByCriteria($criteria, $userProfile->customer_pagesize);
    }


}