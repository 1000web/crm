<div class="span11">
    <?php
    $this->buildFilterButton(DealSource::model()->getOptions('id', 'value', 'prior'), 'dealsource');
    $this->buildFilterButton(DealStage::model()->getOptions('id', 'value', 'prior'), 'dealstage');
    $this->buildFilterButton(DealStage::model()->getStateOptions(), 'deal_status');
    ?>
</div>
