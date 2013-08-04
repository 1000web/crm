<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Продукция',
);

$this->menu = $this->menuOperations('index');

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
        array('name' => 'id', 'header' => '#'),
        array('name' => 'product_type_id', 'header' => 'Тип продукции', 'value' => '$data->productType->value'),
        array('name' => 'value', 'header' => 'Значение'),
        array('name' => 'description', 'header' => 'Описание'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array(
                'style'=>'width: 50px',
            ),
        )
    ),
)); ?>
