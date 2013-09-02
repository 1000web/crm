<div class="span11">
    <h3>Фильтры
    <?php
    $this->buildFilterButton(TaskType::model()->getOptions(), 'tasktype');
    ?>
    </h3>
</div>
