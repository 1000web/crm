<?php

/**
 * This is the model class for table "{{item_log}}".
 *
 * The followings are the available columns in table '{{item_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $parent_id
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property string $url
 * @property string $icon
 * @property string $title
 * @property string $h1
 * @property string $value
 * @property string $description
 */
class ItemLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ItemLog the static model class
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
        return '{{item_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, parent_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('module, controller, action, icon', 'length', 'max' => 64),
            array('url, title, h1, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, parent_id, module, controller, action, icon, url, title, h1, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'parent' => array(self::BELONGS_TO, 'Item', 'parent_id'),
        );
    }
}