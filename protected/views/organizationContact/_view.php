<?php
/* @var $this OrganizationContactController */
/* @var $data OrganizationContact */
?>

<div class="view">

	<?php echo $this->view_value($data); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->organization->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->contactType->value); ?>
	<br />

    <?php echo $this->view_description($data); ?>

</div>