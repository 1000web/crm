<div class="row">
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(TaskType::model()->getOptions(), 'tasktype');
        ?>
    </div>
</div>
