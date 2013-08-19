<?php

/**
 * This is the model class for table "{{menu_item}}".
 *
 * The followings are the available columns in table '{{menu_item}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $parent_id
 * @property integer $menu_id
 * @property integer $item_id
 * @property integer $prior
 * @property integer $visible
 *
 * The followings are the available model relations:
 * @property Users $updateUser
 * @property MenuItem $parent
 * @property MenuItem[] $menuItems
 * @property Menu $menu
 * @property Item $item
 * @property Users $createUser
 */
class MenuItem extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MenuItem the static model class
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
        return '{{menu_item}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_id, item_id, prior, visible', 'required'),
            array('create_time, update_time, create_user_id, update_user_id, parent_id, menu_id, item_id, prior, visible', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, parent_id, menu_id, item_id, prior, visible', 'safe', 'on' => 'search'),
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
            //'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
            //'childs' => array(self::HAS_MANY, 'MenuItem', 'parent_id'),
            //'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
            //'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
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
            'parent_id' => 'Parent',
            'menu_id' => 'Menu',
            'item_id' => 'Item',
            'prior' => 'Prior',
            'visible' => 'Visible',
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
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('prior', $this->prior);
        $criteria->compare('visible', $this->visible);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    function get_menu($menu_name, $parent_id = NULL, $levels = 2)
    {
        //return $this->static_menu();

        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $criteria->join = 'LEFT JOIN {{menu}} menu ON menu.id=menu_id';
        //$criteria->join = ' LEFT JOIN {{item}} item ON item.id=item_id';
        $criteria->addCondition('menu.value=:menu_name');
        $criteria->params[':menu_name'] = $menu_name;
        //$criteria->addCondition('menu_id=3');
        if(!$parent_id) $criteria->addCondition('t.parent_id IS NULL');
        else {
            $criteria->addCondition('t.parent_id=:parent_id');
            $criteria->params[':parent_id'] = $parent_id;
        }
        $criteria->addCondition('t.visible=1');
        $criteria->order = 't.prior';
        $criteria->limit = -1;
        return MenuItem::model()->findAll($criteria);
    }
}