<?php

/**
 * This is the model class for table "{{specification}}".
 *
 * The followings are the available columns in table '{{specification}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $create_user_id
 * @property integer $update_time
 * @property integer $update_user_id
 * @property integer $deal_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Deal $deal
 * @property Users $createUser
 * @property Users $updateUser
 */
class Specification extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Specification the static model class
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
        return '{{specification}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('deal_id, value', 'required'),
            array('create_time, create_user_id, update_time, update_user_id, deal_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, create_user_id, update_time, update_user_id, deal_id, value, description', 'safe', 'on' => 'search'),
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
            'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
        );
    }

    public function getAvailableAttributes()
    {
        return array('id', 'deal_id', 'value', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('deal_id', $this->deal_id);
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
            case 'deal_id':
                $criteria->condition = 'deal_id=:did';
                $criteria->params[':did'] = $param;
                break;
        }
        return $this->getByCriteria($criteria, $userProfile->specification_pagesize);
    }

}