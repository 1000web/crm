<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $superuser
 * @property integer $status
 * @property string $create_at
 * @property string $lastvisit_at
 *
 * The followings are the available model relations:
 * @property ContactType[] $contactTypes
 * @property ContactType[] $contactTypes1
 * @property ContactTypeLog[] $contactTypeLogs
 * @property ContactTypeLog[] $contactTypeLogs1
 * @property Customer[] $customers
 * @property Customer[] $customers1
 * @property Customer[] $customers2
 * @property CustomerContact[] $customerContacts
 * @property CustomerContact[] $customerContacts1
 * @property Organization[] $organizations
 * @property Organization[] $organizations1
 * @property OrganizationContact[] $organizationContacts
 * @property OrganizationContact[] $organizationContacts1
 * @property OrganizationGroup[] $organizationGroups
 * @property OrganizationGroup[] $organizationGroups1
 * @property OrganizationRegion[] $organizationRegions
 * @property OrganizationRegion[] $organizationRegions1
 * @property OrganizationType[] $organizationTypes
 * @property OrganizationType[] $organizationTypes1
 * @property Product[] $products
 * @property Product[] $products1
 * @property ProductType[] $productTypes
 * @property ProductType[] $productTypes1
 * @property Profiles $profiles
 * @property Task[] $tasks
 * @property Task[] $tasks1
 * @property Task[] $tasks2
 * @property TaskType[] $taskTypes
 * @property TaskType[] $taskTypes1
 */
class Users extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
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
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('create_at', 'required'),
            array('superuser, status', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 20),
            array('password, email, activkey', 'length', 'max' => 128),
            array('lastvisit_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, email, activkey, superuser, status, create_at, lastvisit_at', 'safe', 'on' => 'search'),
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
            'contactTypes' => array(self::HAS_MANY, 'ContactType', 'create_user_id'),
            'contactTypes1' => array(self::HAS_MANY, 'ContactType', 'update_user_id'),
            'contactTypeLogs' => array(self::HAS_MANY, 'ContactTypeLog', 'create_user_id'),
            'contactTypeLogs1' => array(self::HAS_MANY, 'ContactTypeLog', 'update_user_id'),
            'customers' => array(self::HAS_MANY, 'Customer', 'create_user_id'),
            'customers1' => array(self::HAS_MANY, 'Customer', 'update_user_id'),
            'customers2' => array(self::HAS_MANY, 'Customer', 'user_id'),
            'customerContacts' => array(self::HAS_MANY, 'CustomerContact', 'create_user_id'),
            'customerContacts1' => array(self::HAS_MANY, 'CustomerContact', 'update_user_id'),
            'organizations' => array(self::HAS_MANY, 'Organization', 'create_user_id'),
            'organizations1' => array(self::HAS_MANY, 'Organization', 'update_user_id'),
            'organizationContacts' => array(self::HAS_MANY, 'OrganizationContact', 'create_user_id'),
            'organizationContacts1' => array(self::HAS_MANY, 'OrganizationContact', 'update_user_id'),
            'organizationGroups' => array(self::HAS_MANY, 'OrganizationGroup', 'create_user_id'),
            'organizationGroups1' => array(self::HAS_MANY, 'OrganizationGroup', 'update_user_id'),
            'organizationRegions' => array(self::HAS_MANY, 'OrganizationRegion', 'create_user_id'),
            'organizationRegions1' => array(self::HAS_MANY, 'OrganizationRegion', 'update_user_id'),
            'organizationTypes' => array(self::HAS_MANY, 'OrganizationType', 'create_user_id'),
            'organizationTypes1' => array(self::HAS_MANY, 'OrganizationType', 'update_user_id'),
            'products' => array(self::HAS_MANY, 'Product', 'create_user_id'),
            'products1' => array(self::HAS_MANY, 'Product', 'update_user_id'),
            'productTypes' => array(self::HAS_MANY, 'ProductType', 'create_user_id'),
            'productTypes1' => array(self::HAS_MANY, 'ProductType', 'update_user_id'),
            'profiles' => array(self::HAS_ONE, 'Profiles', 'user_id'),
            'tasks' => array(self::HAS_MANY, 'Task', 'create_user_id'),
            'tasks1' => array(self::HAS_MANY, 'Task', 'update_user_id'),
            'tasks2' => array(self::HAS_MANY, 'Task', 'user_id'),
            'taskTypes' => array(self::HAS_MANY, 'TaskType', 'create_user_id'),
            'taskTypes1' => array(self::HAS_MANY, 'TaskType', 'update_user_id'),
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('activkey', $this->activkey, true);
        $criteria->compare('superuser', $this->superuser);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_at', $this->create_at, true);
        $criteria->compare('lastvisit_at', $this->lastvisit_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}