<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

    <?php
    echo $this->view_fullname($data);
    ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
    <?php echo CHtml::encode($data->organization->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
    <?php echo CHtml::encode($data->position); ?>
    <br/>

    <?php
    echo $this->view_description($data);
    ?>

</div>