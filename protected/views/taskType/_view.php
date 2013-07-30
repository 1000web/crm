<?php
/* @var $this TaskTypeController */
/* @var $data TaskType */
?>

<div class="view">

    <b><?php echo CHtml::link(CHtml::encode($data->value), array('view', 'id' => $data->id)); ?></b>
    <br/>

    <?php
    echo $this->view_description($data);
    ?>

</div>