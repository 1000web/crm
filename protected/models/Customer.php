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
 * @property string $firstname
 * @property string $lastname
 * @property string $position
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Organization $organization
 * @property Users $user
 * @property Users $createUser
 * @property Users $updateUser
 * @property CustomerContact[] $customerContacts
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('firstname', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, organization_id, user_id', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, position', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, organization_id, user_id, firstname, lastname, position, description', 'safe', 'on' => 'search'),
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
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'customerContacts' => array(self::HAS_MANY, 'CustomerContact', 'customer_id'),
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
        $criteria->compare('organization_id', $this->organization_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}