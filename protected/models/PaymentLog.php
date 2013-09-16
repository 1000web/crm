<?php

/**
 * This is the model class for table "{{payment_log}}".
 *
 * The followings are the available columns in table '{{payment_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $payment_type_id
 * @property integer $deal_id
 * @property string $amount
 * @property string $value
 * @property string $description
 */
class PaymentLog extends LogActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{payment_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_datetime, log_user_id, id, payment_type_id, deal_id', 'numerical', 'integerOnly'=>true),
			array('log_action', 'length', 'max'=>16),
			array('amount', 'length', 'max'=>15),
			array('value', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, log_action, log_datetime, log_user_id, id, payment_type_id, deal_id, amount, value, description', 'safe', 'on'=>'search'),
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

		$criteria=new CDbCriteria;

		$criteria->compare('log_id',$this->log_id);
		$criteria->compare('log_action',$this->log_action,true);
		$criteria->compare('log_datetime',$this->log_datetime);
		$criteria->compare('log_user_id',$this->log_user_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('payment_type_id',$this->payment_type_id);
		$criteria->compare('deal_id',$this->deal_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}