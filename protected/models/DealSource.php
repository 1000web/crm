<?php

/**
 * This is the model class for table "{{deal_source}}".
 *
 * The followings are the available columns in table '{{deal_source}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $prior
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Users $update_user
 * @property Users $create_user
 */
class DealSource extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DealSource the static model class
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
        return '{{deal_source}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, prior', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, prior, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('dealsource');
    }

    public function getAvailableAttributes()
    {
        return array('id', 'prior', 'value', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('prior', $this->prior);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return $this->getByCriteria($criteria);
    }

    public function getAll($userProfile)
    {
        $criteria = new CDbCriteria;
        return $this->getByCriteria($criteria, $userProfile->dealsource_pagesize);
    }

}