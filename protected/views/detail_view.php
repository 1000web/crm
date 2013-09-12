<?php
/* @var $this Controller */

if (MyHelper::checkAccess($this->id, 'log')) {
    $this->attributes = CMap::mergeArray(
        $this->created_updated($data),
        $this->attributes
    );
}
$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped bordered condensed',
    'attributes' => $this->attributes,
    'data' => $this->_model,
));
