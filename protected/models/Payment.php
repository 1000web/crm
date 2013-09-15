<?php

/**
 * This is the model class for table "{{payment}}".
 *
 * The followings are the available columns in table '{{payment}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $payment_type_id
 * @property integer $deal_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Users $create_user
 * @property Users $update_user
 * @property PaymentType $payment_type
 * @property Deal $deal
 */
class Payment extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Payment the static model class
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
        return '{{payment}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('payment_type_id, deal_id, amount, value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, payment_type_id, deal_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, payment_type_id, deal_id, amount, value, description', 'safe', 'on' => 'search'),
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
            'payment_type' => array(self::BELONGS_TO, 'PaymentType', 'payment_type_id'),
            'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
        );
    }

    public function getAvailableAttributes()
    {
        return array(
            'id',
            'deal_id',
            'payment_type_id',
            'amount',
            'value',
            'description',
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
        $criteria->compare('payment_type_id', $this->payment_type_id);
        $criteria->compare('deal_id', $this->deal_id);
        $criteria->compare('amount', $this->amount, true);
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
        if ($userProfile->filter_payment_type_id) {
            $criteria->addCondition('payment_type_id=:type');
            $criteria->params[':type'] = $userProfile->filter_payment_type_id;
        }
        return new CActiveDataProvider('Payment', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->payment_pagesize,
            ),
        ));
    }

}