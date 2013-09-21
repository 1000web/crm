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
 * @property integer $task_stage_id
 * @property integer $task_prior_id
 * @property integer $datetime
 * @property integer $date
 * @property integer $time
 * @property integer $user_id
 * @property integer $owner_id
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
    public static function model($className = __CLASS__)
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
        return array(
            array('log_datetime, log_user_id, id, task_type_id, task_stage_id, task_prior_id, datetime, owner_id, user_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, task_type_id, task_stage_id, task_prior_id, datetime, date, time, owner_id, user_id, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
            'task_type' => array(self::BELONGS_TO, 'TaskType', 'task_type_id'),
            'task_stage' => array(self::BELONGS_TO, 'TaskStage', 'task_stage_id'),
            'task_prior' => array(self::BELONGS_TO, 'TaskPrior', 'task_prior_id'),
        );
    }
}