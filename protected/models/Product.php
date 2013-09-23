<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property integer $create_time
 * @property integer $create_user_id
 * @property integer $update_time
 * @property integer $update_user_id
 * @property integer $specification_id
 * @property integer $safetyclass_id
 * @property integer $prior
 * @property integer $num
 * @property integer $edizm_id
 * @property string $value
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Specification $specification
 * @property Safetyclass $safetyclass
 * @property Edizm $edizm
 * @property Users $createUser
 * @property Users $updateUser
 */
class Product extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
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
        return '{{product}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('specification_id, edizm_id, value', 'required'),
            array('create_time, create_user_id, update_time, update_user_id, specification_id, safetyclass_id, edizm_id, prior, num', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, create_time, create_user_id, update_time, update_user_id, specification_id, safetyclass_id, edizm_id, prior, num, value, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'update_user' => array(self::BELONGS_TO, 'Users', 'update_user_id'),
            'create_user' => array(self::BELONGS_TO, 'Users', 'create_user_id'),

            'specification' => array(self::BELONGS_TO, 'Specification', 'specification_id'),
            'safetyclass' => array(self::BELONGS_TO, 'Safetyclass', 'safetyclass_id'),
            'edizm' => array(self::BELONGS_TO, 'Edizm', 'edizm_id'),
            /*
            'count' => array(self::STAT, 'Product', 'specification_id',
                // 'condition' => 'stato='.Brano::STATUS_CLOSED
            ),/**/

        );
    }

    public function attributeLabels()
    {
        return MyHelper::labels('product');
    }

    public function getAvailableAttributes()
    {
        return array('id', 'specification_id', 'safetyclass_id', 'prior', 'num', 'edizm_id', 'value', 'description');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->with = array('specification', 'safetyclass', 'edizm');

        $criteria->compare('t.id', $this->id);
        $criteria->compare('specification.value', $this->specification_id, true);
        $criteria->compare('safetyclass.value', $this->safetyclass_id, true);
        $criteria->compare('num', $this->num);
        $criteria->compare('edizm.value', $this->edizm_id, true);
        $criteria->compare('t.value', $this->value, true);
        $criteria->compare('t.description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getAll($userProfile, $select = '', $param = 0)
    {
        $criteria = new CDbCriteria;
        switch ($select) {
            case 'specification_id':
                $criteria->condition = 'specification_id=:param1';
                $criteria->params[':param1'] = $param;
                break;
            case 'safetyclass_id':
                $criteria->condition = 'safetyclass_id=:param2';
                $criteria->params[':param2'] = $param;
                break;
            case 'edizm_id':
                $criteria->condition = 'edizm_id=:param3';
                $criteria->params[':param3'] = $param;
                break;
        }
        if ($userProfile->filter_safetyclass_id) {
            $criteria->addCondition('safetyclass_id=:scid');
            $criteria->params[':scid'] = $userProfile->filter_safetyclass_id;
        }
        if ($userProfile->filter_edizm_id) {
            $criteria->addCondition('edizm_id=:eid');
            $criteria->params[':eid'] = $userProfile->filter_edizm_id;
        }
        return $this->getByCriteria($criteria, $userProfile->product_pagesize);
    }

}