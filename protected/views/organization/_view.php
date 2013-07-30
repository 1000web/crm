<?php
/* @var $this OrganizationController */
/* @var $data Organization */
?>

<div class="view">

    <?php
    echo $this->view_value($data);
    ?>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_type_id')); ?>:</b>
    <?php echo CHtml::encode($data->organizationType->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_group_id')); ?>:</b>
    <?php echo CHtml::encode($data->organizationGroup->value); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('organization_region_id')); ?>:</b>
    <?php echo CHtml::encode($data->organizationRegion->value); ?>
    <br/>

    <?php
    echo $this->view_description($data);
    ?>

</div>