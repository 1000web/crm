<div class="span11">
    <?php
    $this->buildFilterButton(DealSource::model()->getOptions('id', 'value', 'prior'), 'deal_source_id');
    $this->buildFilterButton(DealStage::model()->getOptions('id', 'value', 'prior'), 'deal_stage_id');
    $this->buildFilterButton(DealStage::model()->getStateOptions(), 'deal_status');
    ?>
</div>
