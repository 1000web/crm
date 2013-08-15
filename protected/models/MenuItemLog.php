<?php

/**
 * This is the model class for table "{{menu_item_log}}".
 *
 * The followings are the available columns in table '{{menu_item_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $parent_id
 * @property integer $menu_id
 * @property integer $item_id
 * @property integer $prior
 * @property integer $visible
 * @property string $value
 * @property string $description
 */
class MenuItemLog extends LogActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuItemLog the static model class
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
		return '{{menu_item_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_datetime, log_user_id, id, parent_id, menu_id, item_id, prior, visible', 'numerical', 'integerOnly'=>true),
			array('log_action', 'length', 'max'=>16),
			array('value', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, log_action, log_datetime, log_user_id, id, parent_id, menu_id, item_id, prior, visible, value, description', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'menu_id' => 'Menu',
			'item_id' => 'Item',
			'prior' => 'Prior',
			'visible' => 'Visible',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('prior',$this->prior);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}