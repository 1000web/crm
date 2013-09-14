<?php
/* @var $this Controller */

// если есть права. показываем кто когда создал и изменил последний раз
if (MyHelper::checkAccess($this->id, 'log')) $this->attributes = $this->created_updated($this->_model);

// добавляем в Вид все возможные столбцы этой модели для отображения
$this->addAttributes($this->_model->getAvailableAttributes());

$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped bordered condensed',
    'attributes' => $this->attributes,
    'data' => $this->_model,
));
