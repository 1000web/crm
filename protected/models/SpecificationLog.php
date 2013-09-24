<?php

/**
 * This is the model class for table "{{specification_log}}".
 *
 * The followings are the available columns in table '{{specification_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $deal_id
 * @property integer $spkd_id

 * @property integer $zakaz_num
 * @property string $zakaz_date
 * @property string $out_num
 * @property string $out_date

 * @property string $value
 * @property string $description
 */
class SpecificationLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SpecificationLog the static model class
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
        return '{{specification_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, deal_id, spkd_id, zakaz_num', 'numerical', 'integerOnly' => true),
            array('log_action, out_num', 'length', 'max' => 16),
            array('zakaz_date, out_date', 'length', 'max' => 10),
            array('out_num', 'length', 'max' => 16),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, deal_id, spkd_id, zakaz_num, zakaz_date, out_num, out_date, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'deal' => array(self::BELONGS_TO, 'Deal', 'deal_id'),
        );
    }
}