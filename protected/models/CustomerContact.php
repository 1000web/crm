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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
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
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'contact_type' => array(self::BELONGS_TO, 'ContactType', 'contact_type_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
        );
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
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('contact_type_id', $this->contact_type_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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
        return new CActiveDataProvider('CustomerContact', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->customercontact_pagesize,
            ),
        ));
    }

}