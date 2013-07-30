<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
    <?php echo CHtml::encode($data->create_time); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
    <?php echo CHtml::encode($data->update_time); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
    <?php echo CHtml::encode($data->create_user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
    <?php echo CHtml::encode($data->update_user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('task_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->task_type_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('datetime')); ?>:</b>
    <?php echo CHtml::encode($data->datetime); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	*/
    ?>

</div>