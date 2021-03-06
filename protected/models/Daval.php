<?php

/**
 * This is the model class for table "{{daval}}".
 *
 * The followings are the available columns in table '{{daval}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $create_user_id
 * @property integer $update_time
 * @property integer $update_user_id
 * @property integer $specification_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Specification $specification
 * @property Users $createUser
 * @property Users $updateUser
 */
class Daval extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Daval the static model class
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
        return '{{daval}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('specification_id, edizm_id, num, value', 'required'),
            array('create_time, create_user_id, update_time, update_user_id, specification_id, edizm_id, num', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, create_user_id, update_time, update_user_id, specification_id, edizm_id, num, value, description', 'safe', 'on' => 'search'),
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

            'specification' => array(self::BELONGS_TO, 'Specification', 'specification_id'),
            'edizm' => array(self::BELONGS_TO, 'Edizm', 'edizm_id'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('daval');
    }

    public function getAvailableAttributes()
    {
        return array('id', 'specification_id', 'value', 'num', 'edizm_id', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('specification', 'edizm');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('specification.value', $this->specification_id, true);
        $criteria->compare('edizm.value', $this->edizm_id, true);
        $criteria->compare('t.num', $this->num, true);
        $criteria->compare('t.value', $this->value, true);
        $criteria->compare('t.description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        switch ($select) {
            case 'specification_id':
                $criteria->condition = 'specification_id=:sid';
                $criteria->params[':sid'] = $param;
                break;
        }
        return $this->getByCriteria($criteria, $userProfile->daval_pagesize);
    }

}