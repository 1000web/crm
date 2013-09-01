<?php

/**
 * This is the model class for table "{{item}}".
 *
 * The followings are the available columns in table '{{item}}':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property string $icon
 * @property string $title
 * @property string $h1
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Item $parent
 * @property Item[] $items
 * @property Users $createUser
 * @property Users $updateUser
 * @property MenuItem[] $menuItems
 */
class Item extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
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
        return '{{item}}';
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
            array('parent_id, create_time, update_time, create_user_id, update_user_id', 'numerical', 'integerOnly' => true),
            array('module, controller, action, icon', 'length', 'max' => 64),
            array('title, h1, value', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, create_time, update_time, create_user_id, update_user_id, module, controller, action, icon, title, h1, value, description', 'safe', 'on' => 'search'),
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
            'parent' => array(self::BELONGS_TO, 'Item', 'parent_id'),
            'childs' => array(self::HAS_MANY, 'Item', 'parent_id'),
            'createUser' => array(self::BELONGS_TO, 'Users', 'create_user_id'),
            'updateUser' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'menuItems' => array(self::HAS_MANY, 'MenuItem', 'item_id'),
            'menus' => array(self::HAS_MANY, 'Menu', 'menu_id', 'through' => 'menuItems'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_user_id' => 'Create User',
            'update_user_id' => 'Update User',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
            'icon' => 'Icon',
            'title' => 'Title',
            'h1' => 'H1',
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
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('create_user_id', $this->create_user_id);
        $criteria->compare('update_user_id', $this->update_user_id);
        $criteria->compare('module', $this->module, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('icon', $this->icon, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('h1', $this->h1, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile)
    {
        $criteria = new CDbCriteria;
        if ($controller = $userProfile->filter_itemcontroller) {
            $criteria->addCondition('controller=:controller');
            $criteria->params[':controller'] = $controller;
        }
        if ($module = $userProfile->filter_itemmodule) {
            $criteria->addCondition('module=:module');
            $criteria->params[':module'] = $module;
        }
        if ($action = $userProfile->filter_itemaction) {
            $criteria->addCondition('action=:action');
            $criteria->params[':action'] = $action;
        }
        if ($parent = $userProfile->filter_itemparent) {
            $criteria->addCondition('parent_id=:parent');
            $criteria->params[':parent'] = $parent;
        }
        return new CActiveDataProvider('Item', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $userProfile->item_pagesize,
            ),
        ));
    }

}