<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

    <?php echo $this->view_value($data); ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('product_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->productType->value); ?>
    <br/>

    <?php echo $this->view_description($data); ?>

</div>