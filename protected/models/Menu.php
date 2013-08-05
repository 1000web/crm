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

    function get_menu($menu_name, $parent = NULL, $levels = 2)
    {
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
        }

        /*
        echo '<pre>';
        print_r($items);
        echo '</pre>';
        /**/

        $items = array(
            array('label' => 'Клиенты', 'url' => array('/customer/index'),
                'items' => array(
                    array('label' => 'Список клиентов', 'url' => array('/customer/index')),
                    array('label' => 'Контакты клиентов', 'url' => array('/customerContact/index')),
                    array('label' => 'Создать клиента', 'url' => array('/customer/create')),
                ),
            ),
            array('label' => 'Организации',
                'items' => array(
                    array('label' => 'Список организаций', 'url' => array('/organization/index')),
                    array('label' => 'Создать организацию', 'url' => array('/organization/create')),
                ),
            ),
            array('label' => 'Операции',
                'items' => array(
                    array('label' => 'Список операций', 'url' => array('/task/index')),
                    array('label' => 'Создать операцию', 'url' => array('/task/create')),
                ),
            ),
            array('label' => 'Сделки',
                'items' => array(
                    array('label' => 'Список сделок', 'url' => array('/deal/index')),
                    array('label' => 'Создать сделку', 'url' => array('/deal/create')),
                ),
            ),
            array('label' => 'Справочники',
                'items' => array(
                    array('label' => 'Контрагенты',
                        'items' => array(
                            array('label' => 'Типы организаций', 'url' => array('/organizationType/index')),
                            array('label' => 'Регионы организаций', 'url' => array('/organizationRegion/index')),
                            array('label' => 'Группы организаций', 'url' => array('/organizationGroup/index')),
                            array('label' => 'Контакты организаций', 'url' => array('/organizationContact/index')),
                        ),
                    ),
                    array('label' => 'Типы контактов', 'url' => array('/contactType/index')),
                    array('label' => 'Типы операций', 'url' => array('/taskType/index')),
                ),
            ),
            //array('label' => 'База знаний', 'url' => array('/kb/index')),
            array('label' => 'Войти', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
            array('label' => 'Профиль', 'visible' => !Yii::app()->user->isGuest,
                'items' => array(
                    array('label' => 'Профиль', 'url' => array('/user/profile/profile')),
                    array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/user/logout')),
                ),
            ),

        );

        return $items;
    }
}