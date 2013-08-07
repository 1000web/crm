<?php

/**
 * This is the model class for table "{{customer_log}}".
 *
 * The followings are the available columns in table '{{customer_log}}':
 * @property integer $log_id
 * @property integer $deleted
 * @property integer $id
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $organization_id
 * @property integer $user_id
 * @property string $position
 * @property string $value
 * @property string $description
 */
class CustomerLog extends MyActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CustomerLog the static model class
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
        return '{{customer_log}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, value', 'required'),
            array('deleted, id, create_time, update_time, create_user_id, update_user_id, organization_id, user_id', 'numerical', 'integerOnly' => true),
            array('value, position', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('log_id, deleted, id, create_time, update_time, create_user_id, update_user_id, organization_id, user_id, value, position, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
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

        $criteria->compare('log_id', $this->log_id);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('id', $this->id);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('create_user_id', $this->create_user_id);
        $criteria->compare('update_user_id', $this->update_user_id);
        $criteria->compare('organization_id', $this->organization_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}