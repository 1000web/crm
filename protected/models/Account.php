<?php

/**
 * This is the model class for table "{{account}}".
 *
 * The followings are the available columns in table '{{account}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $organization_id
 * @property string $bank
 * @property integer $bik
 * @property integer $inn
 * @property integer $kpp
 * @property string $korr
 * @property string $schet
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Organization $organization
 * @property Users $createUser
 * @property Users $updateUser
 */
class Account extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Account the static model class
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
        return '{{account}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, organization_id, bik, inn, kpp', 'numerical', 'integerOnly' => true),
            array('bank, korr, schet, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, organization_id, bank, bik, inn, kpp, korr, schet, value, description', 'safe', 'on' => 'search'),
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
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
        );
    }

    public function getAvailableAttributes()
    {
        return array('id', 'organization_id', 'value', 'bank', 'bik', 'inn', 'kpp', 'korr', 'schet', 'description');
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
        $criteria->compare('organization_id', $this->organization_id);
        $criteria->compare('bank', $this->bank, true);
        $criteria->compare('bik', $this->bik, true);
        $criteria->compare('inn', $this->inn, true);
        $criteria->compare('kpp', $this->kpp, true);
        $criteria->compare('korr', $this->korr, true);
        $criteria->compare('schet', $this->schet, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return $this->getByCriteria($criteria);
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        switch ($select) {
            case 'organization_id':
                $criteria->condition = 'organization_id=:oid';
                $criteria->params[':oid'] = $param;
                break;
        }
        return $this->getByCriteria($criteria, $userProfile->account_pagesize);
    }

}