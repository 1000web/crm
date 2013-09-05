<?php

/**
 * This is the model class for table "{{customer_contact_log}}".
 *
 * The followings are the available columns in table '{{customer_contact_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $contact_type_id
 * @property integer $customer_id
 * @property string $value
 * @property string $description
 */
class CustomerContactLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerContactLog the static model class
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
        return '{{customer_contact_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('log_datetime, log_user_id, id, contact_type_id, customer_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, contact_type_id, customer_id, value, description', 'safe', 'on' => 'search'),
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
            'contact_type' => array(self::BELONGS_TO, 'ContactType', 'contact_type_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'log_id' => 'Log',
            'log_action' => 'Log Action',
            'log_datetime' => 'Log Datetime',
            'log_user_id' => 'Log User',
            'id' => 'ID',
            'contact_type_id' => 'Contact Type',
            'customer_id' => 'Customer',
            'value' => 'Value',
            'description' => 'Description',
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

        $criteria->compare('log_id', $this->log_id);
        $criteria->compare('log_action', $this->log_action, true);
        $criteria->compare('log_datetime', $this->log_datetime);
        $criteria->compare('log_user_id', $this->log_user_id);
        $criteria->compare('id', $this->id);
        $criteria->compare('contact_type_id', $this->contact_type_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile, $id)
    {
        $criteria = new CDbCriteria;

        $criteria->order = 'log_datetime DESC';
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;

        return new CActiveDataProvider('CustomerContactLog', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->customercontact_pagesize,
            ),
        ));
    }

}