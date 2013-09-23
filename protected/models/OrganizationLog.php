<?php

/**
 * This is the model class for table "{{organization_log}}".
 *
 * The followings are the available columns in table '{{organization_log}}':
 * @property integer $log_id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $id
 * @property integer $organization_type_id
 * @property integer $organization_group_id
 * @property integer $organization_region_id
 * @property string $organization_name
 * @property string $value
 * @property string $description
 */
class OrganizationLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OrganizationLog the static model class
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
        return '{{organization_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('log_datetime, log_user_id, id, organization_type_id, organization_group_id, organization_region_id', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('value, organization_name', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, log_action, log_datetime, log_user_id, id, organization_type_id, organization_group_id, organization_region_id, organization_name, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'log_user' => array(self::BELONGS_TO, 'Users', 'log_user_id'),
            'organization_type' => array(self::BELONGS_TO, 'OrganizationType', 'organization_type_id'),
            'organization_group' => array(self::BELONGS_TO, 'OrganizationGroup', 'organization_group_id'),
            'organization_region' => array(self::BELONGS_TO, 'OrganizationRegion', 'organization_region_id'),
        );
    }
}