<div class="span11">
    <?php
    $this->buildFilterButton(TaskType::model()->getOptions(), 'task_type_id');
    $this->buildFilterButton(TaskStage::model()->getOptions(), 'task_stage_id');
    $this->buildFilterButton(TaskPrior::model()->getOptions(), 'task_prior_id');
    $this->buildFilterButton(Users::model()->getOptions('id', 'username'), 'task_user_id');
    $this->buildFilterButton(Users::model()->getOptions('id', 'username'), 'task_owner_id');
    $this->buildFilterButton(TaskStage::model()->getStateOptions(), 'task_status');
    ?>
</div>
