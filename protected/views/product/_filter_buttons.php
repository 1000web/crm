<div class="span11">
    <?php
    $this->buildFilterButton(Safetyclass::model()->getOptions('id', 'value', 'prior,value'), 'safetyclass_id');
    $this->buildFilterButton(Edizm::model()->getOptions(), 'edizm_id');
    ?>
</div>
