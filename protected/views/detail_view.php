<?php
/* @var $this Controller */

// если есть права, показываем кто когда создал и изменил последний раз
if (MyHelper::checkAccess($this->id, 'log')) {
    //$this->addAttributes(array('create_time','create_user_id','update_time','update_user_id'));
    $this->attributes = array(
        'create_time' => array(
            'name' => 'create_time',
            'label' => $this->getLabel('create_time'),
            'value' => date('Y-m-d H:i:s', $this->_model->create_time)),
        'create_user_id' => array(
            'name' => 'create_user_id',
            'label' => $this->getLabel('create_user_id'),
            'value' => $this->_model->create_user->profiles->last_name . ' ' . $this->_model->create_user->profiles->first_name . ' (' . $this->_model->create_user->username . ')'),
        'update_time' => array(
            'name' => 'update_time',
            'label' => $this->getLabel('update_time'),
            'value' => date('Y-m-d H:i:s', $this->_model->update_time)),
        'update_user_id' => array(
            'name' => 'update_user_id',
            'label' => $this->getLabel('update_user_id'),
            'value' => $this->_model->update_user->profiles->last_name . ' ' . $this->_model->update_user->profiles->first_name . ' (' . $this->_model->update_user->username . ')'),
    );
}
// добавляем в Вид все возможные столбцы этой модели для отображения
$this->addAttributes($this->_model->getAvailableAttributes());

$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped bordered condensed',
    'attributes' => $this->attributes,
    'data' => $this->_model,
));
