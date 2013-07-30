<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

    <?php
    echo $this->view_value($data);
    ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('task_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->task_type_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('datetime')); ?>:</b>
    <?php echo CHtml::encode($data->datetime); ?>
    <br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

    <?php
    echo $this->view_description($data);
    ?>

</div>