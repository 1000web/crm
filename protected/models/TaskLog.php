<?php

/**
 * This is the model class for table "{{task_log}}".
 *
 * The followings are the available columns in table '{{task_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $task_type_id
 * @property integer $datetime
 * @property integer $user_id
 * @property string $value
 * @property string $description
 */
class TaskLog extends LogActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TaskLog the static model class
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
		return '{{task_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_datetime, log_user_id, id, task_type_id, datetime, user_id', 'numerical', 'integerOnly'=>true),
			array('log_action', 'length', 'max'=>16),
			array('value', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, log_action, log_datetime, log_user_id, id, task_type_id, datetime, user_id, value, description', 'safe', 'on'=>'search'),
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
			'task_type_id' => 'Task Type',
			'datetime' => 'Datetime',
			'user_id' => 'User',
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

		$criteria=new CDbCriteria;

		$criteria->compare('log_id',$this->log_id);
		$criteria->compare('log_action',$this->log_action,true);
		$criteria->compare('log_datetime',$this->log_datetime);
		$criteria->compare('log_user_id',$this->log_user_id);
		$criteria->compare('id',$this->id);
		$criteria->compare('task_type_id',$this->task_type_id);
		$criteria->compare('datetime',$this->datetime);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}