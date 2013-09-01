<?php

/**
 * This is the model class for table "{{organization}}".
 *
 * The followings are the available columns in table '{{organization}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $organization_type_id
 * @property integer $organization_group_id
 * @property integer $organization_region_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 * @property Deal[] $deals
 * @property Users $createUser
 * @property Users $updateUser
 * @property OrganizationType $organizationType
 * @property OrganizationGroup $organizationGroup
 * @property OrganizationRegion $organizationRegion
 * @property OrganizationContact[] $organizationContacts
 * @property Users[] $tblUsers
 * @property Users[] $favUsers
 */
class Organization extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Organization the static model class
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
        return '{{organization}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('organization_type_id, organization_group_id, organization_region_id, value', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, organization_type_id, organization_group_id, organization_region_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, organization_type_id, organization_group_id, organization_region_id, value, description', 'safe', 'on' => 'search'),
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
            'customers' => array(self::HAS_MANY, 'Customer', 'organization_id'),
            'deals' => array(self::HAS_MANY, 'Deal', 'organization_id'),
            'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'organizationType' => array(self::BELONGS_TO, 'OrganizationType', 'organization_type_id'),
            'organizationGroup' => array(self::BELONGS_TO, 'OrganizationGroup', 'organization_group_id'),
            'organizationRegion' => array(self::BELONGS_TO, 'OrganizationRegion', 'organization_region_id'),
            'organizationContacts' => array(self::HAS_MANY, 'OrganizationContact', 'organization_id'),
            'tblUsers' => array(self::MANY_MANY, 'Users', '{{organization_fav}}(organization_id, user_id)'),
            'favUsers' => array(self::HAS_MANY, 'OrganizationFav', 'id'),
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
            'organization_type_id' => 'Organization Type',
            'organization_group_id' => 'Organization Group',
            'organization_region_id' => 'Organization Region',
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
        $criteria->compare('organization_type_id', $this->organization_type_id);
        $criteria->compare('organization_group_id', $this->organization_group_id);
        $criteria->compare('organization_region_id', $this->organization_region_id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile, $select = '')
    {
        $criteria = new CDbCriteria;
        switch($select) {
            case 'favorite':
                $criteria->join = 'LEFT JOIN {{organization_fav}} j ON j.id=t.id';
                $criteria->condition = 'j.user_id=:userid';
                $criteria->params = array(':userid' => Yii::app()->user->id);
                break;
        }
        //$criteria->order = 'value ASC';
        //$criteria->order = $userProfile->organization_sort;
        //$criteria->limit = -1;
        if ($type = $userProfile->filter_organizationtype) {
            $criteria->addCondition('organization_type_id=:type');
            $criteria->params[':type'] = $type;
        }
        if ($group = $userProfile->filter_organizationgroup) {
            $criteria->addCondition('organization_group_id=:group');
            $criteria->params[':group'] = $group;
        }
        if ($region = $userProfile->filter_organizationregion) {
            $criteria->addCondition('organization_region_id=:region');
            $criteria->params[':region'] = $region;
        }
        return new CActiveDataProvider('Organization', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->organization_pagesize,
            ),
        ));
    }

}