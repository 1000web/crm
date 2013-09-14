<div class="span11">
    <?php
    $this->buildFilterButton(DealSource::model()->getOptions('id', 'value', 'prior'), 'deal_source_id');
    $this->buildFilterButton(DealStage::model()->getOptions('id', 'value', 'prior'), 'deal_stage_id');
    $this->buildFilterButton(DealStage::model()->getStateOptions(), 'deal_status');
    $this->buildFilterButton(array(25 => '25%', 50 => '50%', 75 => '75%', 100 => '100%'), 'deal_probability');
    ?>
</div>
