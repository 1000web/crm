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
 * @property integer $spkd_id

 * @property integer $zakaz_num
 * @property string $zakaz_date
 * @property string $out_num
 * @property string $out_date

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
        return array(
            array('deal_id, spkd_id, value', 'required'),
            array('create_time, create_user_id, update_time, update_user_id, deal_id, spkd_id, zakaz_num', 'numerical', 'integerOnly' => true),
            array('zakaz_date, out_date', 'length', 'max' => 10),
            array('out_num', 'length', 'max' => 16),
            array('value', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, create_user_id, update_time, update_user_id, deal_id, spkd_id, zakaz_num, zakaz_date, out_num, out_date, value, description', 'safe', 'on' => 'search'),
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
            'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
            'spkd' => array(self::BELONGS_TO, 'Spkd', 'spkd_id'),
        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('specification');
    }

    public function getAvailableAttributes()
    {
        return array('id', 'deal_id',  'spkd_id', 'zakaz_num', 'zakaz_date', 'out_num', 'out_date', 'value', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('deal');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('deal.value', $this->deal_id, true);
        $criteria->compare('spkd.value', $this->deal_id, true);
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
            case 'deal_id':
                $criteria->condition = 'deal_id=:param';
                $criteria->params[':param'] = $param;
                break;
            case 'spkd_id':
                $criteria->condition = 'spkd_id=:param';
                $criteria->params[':param'] = $param;
                break;
        }
        return $this->getByCriteria($criteria, $userProfile->specification_pagesize);
    }

}