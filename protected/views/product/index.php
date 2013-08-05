<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs  = $this->make_breadcrumbs('index');;
$this->menu         = $this->menuOperations('index');

?>

<h1>Продукция</h1>

<?php /*
<b><?php echo CHtml::encode($data->getAttributeLabel('product_type_id')); ?>:</b>
<?php echo CHtml::encode($data->productType->value); ?>
<br/>
*/?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'product_type_id', 'header' => $this->attributeLabels('product_type_id'), 'value' => '$data->productType->value'),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>
