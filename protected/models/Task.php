<?php

/**
 * This is the model class for table "{{task}}".
 *
 * The followings are the available columns in table '{{task}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $task_type_id
 * @property integer $datetime
 * @property integer $user_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Users $createUser
 * @property Users $updateUser
 * @property Users $user
 * @property TaskType $taskType
 * @property Users[] $favUsers
 */
class Task extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Task the static model class
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
        return '{{task}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('task_type_id, datetime, user_id, value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, task_type_id, datetime, user_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, task_type_id, datetime, user_id, value, description', 'safe', 'on' => 'search'),
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
            'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'taskType' => array(self::BELONGS_TO, 'TaskType', 'task_type_id'),
            'favUsers' => array(self::MANY_MANY, 'Users', '{{task_fav}}(id, user_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_user_id' => 'Create User',
            'update_user_id' => 'Update User',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('create_user_id', $this->create_user_id);
        $criteria->compare('update_user_id', $this->update_user_id);
        $criteria->compare('task_type_id', $this->task_type_id);
        $criteria->compare('datetime', $this->datetime);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getFavorite($userProfile)
    {
        $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN {{task_fav}} j ON j.id=t.id';
        $criteria->condition = 'j.user_id=:userid';
        $criteria->params = array(':userid' => Yii::app()->user->id);
        $criteria->order = 'value';
        $criteria->limit = -1;
        return new CActiveDataProvider('Task', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->task_pagesize,
            ),
        ));
    }

    public function getAll($userProfile, $select = '')
    {
        $criteria = new CDbCriteria;
        switch($select) {
            case 'favorite':
                $criteria->join = 'LEFT JOIN {{task_fav}} j ON j.id=t.id';
                $criteria->condition = 'j.user_id=:userid';
                $criteria->params = array(':userid' => Yii::app()->user->id);
                break;
        }
        if ($type = $userProfile->filter_tasktype) {
            $criteria->addCondition('task_type_id=:type');
            $criteria->params[':type'] = $type;
        }
        return new CActiveDataProvider('Task', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->task_pagesize,
            ),
        ));
    }

}