<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Users $createUser
 * @property Users $updateUser
 * @property MenuItem[] $menuItems
 */
class Menu extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Menu the static model class
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
        return '{{menu}}';
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
            array('create_time, update_time, create_user_id, update_user_id', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 64),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, update_time, create_user_id, update_user_id, value, description', 'safe', 'on' => 'search'),
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
            'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
            'items' => array(self::HAS_MANY, 'Item', 'item_id', 'through' => 'menuItems'),
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
        $criteria->compare('value', $this->value, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    function get_menu($menu_name, $parent = NULL, $levels = 2){
        return $this->static_menu();
    }
    function static_menu()
    {
        /*
        $menu = $this->with('menuItems', 'items')->findByAttributes(array(
            'value' => $menu_name,
        ));
        $items = array();
        $keys_menuItems = array(
            'parent_id', 'prior', 'visible',
        );
        foreach($menu->menuItems as $item) {
            foreach($keys_menuItems as $key) {
                $items[$item['item_id']][$key] = $item[$key];
            }
        }

        $keys_items = array(
            'title', 'h1', 'module', 'controller', 'action', 'value', 'description',
        );
        foreach($menu->items as $item) {
            foreach($keys_items as $key) {
                //$items[$item['id']][$key] = $item[$key];
                $items[$item['id']][$key] = $item[$key];
            }
        }/**/
        $items = array(
            array('label' => 'Клиенты', 'url' => array('/customer/index'),
                'items' => array(
                    array('label' => 'Избранные', 'icon' => 'icon-star', 'url' => array('/customer/favorite')),
                    array('label' => 'Список клиентов', 'icon' => 'icon-list', 'url' => array('/customer/index')),
                    array('label' => 'Контакты клиентов', 'icon' => 'icon-envelope', 'url' => array('/customercontact/index')),
                    array('label' => 'Создать клиента', 'icon' => 'icon-plus', 'url' => array('/customer/create')),
                ),
            ),
            array('label' => 'Организации',
                'items' => array(
                    array('label' => 'Избранные', 'icon' => 'icon-star', 'url' => array('/organization/favorite')),
                    array('label' => 'Список организаций', 'icon' => 'icon-list', 'url' => array('/organization/index')),
                    array('label' => 'Контакты организаций', 'icon' => 'icon-envelope', 'url' => array('/organizationcontact/index')),
                    array('label' => 'Создать организацию', 'icon' => 'icon-plus', 'url' => array('/organization/create')),
                ),
            ),
            array('label' => 'Задачи',
                'items' => array(
                    array('label' => 'Избранные', 'icon' => 'icon-star', 'url' => array('/task/favorite')),
                    array('label' => 'Список задач', 'icon' => 'icon-tasks', 'url' => array('/task/index')),
                    array('label' => 'Типы задач', 'icon' => 'icon-tags', 'url' => array('/tasktype/index')),
                    array('label' => 'Этапы задач', 'icon' => 'icon-signal', 'url' => array('/taskstage/index')),
                    array('label' => 'Приоритеты задач', 'icon' => 'icon-signal', 'url' => array('/taskprior/index')),
                    array('label' => 'Создать задачу', 'icon' => 'icon-plus', 'url' => array('/task/create')),
                ),
            ),
            array('label' => 'Сделки',
                'items' => array(
                    array('label' => 'Избранные', 'icon' => 'icon-star', 'url' => array('/deal/favorite')),
                    array('label' => 'Список сделок', 'icon' => 'icon-briefcase', 'url' => array('/deal/index')),
                    array('label' => 'Этапы сделок', 'icon' => 'icon-signal', 'url' => array('/dealstage/index')),
                    array('label' => 'Источники сделок', 'icon' => 'icon-list', 'url' => array('/dealsource/index')),
                    array('label' => 'Создать сделку', 'icon' => 'icon-plus', 'url' => array('/deal/create')),
                ),
            ),
            array('label' => 'Справочники',
                'items' => array(
                    array('label' => 'Организации',
                        'items' => array(
                            array('label' => 'Типы организаций', 'icon' => 'icon-tags', 'url' => array('/organizationtype/index')),
                            array('label' => 'Группы организаций', 'icon' => 'icon-tags', 'url' => array('/organizationgroup/index')),
                            array('label' => 'Регионы организаций', 'icon' => 'icon-globe', 'url' => array('/organizationregion/index')),
                        ),
                    ),
                    array('label' => 'Меню',
                        'items' => array(
                            array('label' => 'Меню', 'url' => array('/menu/index')),
                            array('label' => 'Пункты', 'url' => array('/item/index')),
                            array('label' => 'Пункты меню', 'url' => array('/menuitem/index')),
                        ),
                    ),
                    array('label' => 'Типы контактов', 'icon' => 'icon-tags', 'url' => array('/contacttype/index')),
                    array('label' => 'Продукция', 'icon' => 'icon-wrench', 'url' => array('/product/index')),
                    array('label' => 'Типы продукции', 'icon' => 'icon-tags', 'url' => array('/producttype/index')),
                    array('label' => 'База знаний', 'icon' => 'icon-book', 'url' => array('/kb/index')),
                ),
            ),
            //array('label' => 'База знаний', 'url' => array('/kb/index')),
            array('label' => 'Войти', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Профиль', 'visible' => !Yii::app()->user->isGuest,
                'items' => array(
                    array('label' => 'Rights', 'url' => array('/rights/assignment/view')),
                    array('label' => 'Gii', 'url' => array('/gii/')),
                    array('label' => 'DB Dump', 'url' => array('/sxd/')),
                    array('label' => 'Профиль', 'icon' => 'icon-user', 'url' => array('/user/profile/profile')),
                    array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'icon' => 'icon-off', 'url' => array('/user/logout')),
                ),
            ),

        );
        return $items;
    }
}