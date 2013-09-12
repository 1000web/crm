<div class="span11">
    <?php
    $this->buildFilterButton(TaskType::model()->getOptions(), 'tasktype');
    $this->buildFilterButton(TaskStage::model()->getOptions(), 'taskstage');
    $this->buildFilterButton(TaskPrior::model()->getOptions(), 'taskprior');
    $this->buildFilterButton(Users::model()->getOptions('id','username'), 'taskuser');
    $this->buildFilterButton(Users::model()->getOptions('id','username'), 'taskowner');
    $this->buildFilterButton(TaskStage::model()->getStateOptions(), 'task_status');
    ?>
</div>
