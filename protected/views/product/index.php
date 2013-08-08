<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

$columns = array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'product_type_id', 'header' => $this->attributeLabels('product_type_id'), 'value' => '$data->productType->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
);

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns' => $columns,
));
