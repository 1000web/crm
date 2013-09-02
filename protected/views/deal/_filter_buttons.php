<div class="span11">
    <?php
    $this->buildFilterButton(DealSource::model()->getOptions('id', 'value', 'prior'), 'dealsource');
    $this->buildFilterButton(DealStage::model()->getOptions('id', 'value', 'prior'), 'dealstage');
    ?>
</div>
