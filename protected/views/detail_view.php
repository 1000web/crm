<?php
/* @var $this Controller */
/* @var $dataProvider dataProvider */

if (MyHelper::checkAccess($this->id, 'log')) {
    $this->attributes = CMap::mergeArray(
        $this->created_updated($dataProvider),
        $this->attributes
    );
}

//if(MyHelper::checkAccess($this->id, 'log')) $this->addAttributes(array('create_time', 'update_time'));
/*
$this->set_attributes_values($dataProvider);

echo '<pre>';
print_r($this->attributes);
echo '</pre>';/**/

$this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => 'striped bordered condensed',
    'attributes' => $this->attributes,
    'data' => $dataProvider,
));
