<?php
/* @var $this CustomerContactController */
/* @var $data CustomerContact */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
    <?php echo CHtml::encode($data->customer->lastname . ' ' . $data->customer->firstname); ?>
    <br/>

    <?php
    echo "<b>" . CHtml::encode($data->contactType->value) . "</b>: \n";
    echo CHtml::encode($data->value);
    ?>
    <br/>

    <?php echo $this->view_description($data); ?>

</div>
