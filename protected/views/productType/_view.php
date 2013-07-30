<?php
/* @var $this ProductTypeController */
/* @var $data ProductType */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
    <?php echo CHtml::encode($data->value); ?>
    <br/>

    <?php
    echo $this->view_description($data);
    ?>

</div>