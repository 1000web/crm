<?php

/**
 * This is the model class for table "{{account_log}}".
 *
 * The followings are the available columns in table '{{account_log}}':
 * @property integer $log_id
 * @property integer $id
 * @property string $log_action
 * @property integer $log_datetime
 * @property integer $log_user_id
 * @property integer $organization_id
 * @property string $bank
 * @property integer $bik
 * @property integer $inn
 * @property integer $kpp
 * @property string $korr
 * @property string $schet
 * @property string $value
 * @property string $description
 */
class AccountLog extends LogActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AccountLog the static model class
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
        return '{{account_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value', 'required'),
            array('id, log_datetime, log_user_id, organization_id, bik, inn, kpp', 'numerical', 'integerOnly' => true),
            array('log_action', 'length', 'max' => 16),
            array('bank, korr, schet, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, id, log_action, log_datetime, log_user_id, organization_id, bank, bik, inn, kpp, korr, schet, value, description', 'safe', 'on' => 'search'),
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
            'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
        );
    }

    public function getAll($userProfile, $id)
    {
        $criteria = new CDbCriteria();

        $criteria->order = 'log_datetime DESC';
        $criteria->addCondition('id=:id');
        $criteria->params[':id'] = $id;

        return new CActiveDataProvider('AccountLog', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->account_pagesize,
            ),
        ));

    }

}