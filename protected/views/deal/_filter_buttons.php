<div class="span11">
    <h3>Фильтры
    <?php
    $this->buildFilterButton(DealSource::model()->getOptions('id', 'value', 'prior'), 'dealsource');
    $this->buildFilterButton(DealStage::model()->getOptions('id', 'value', 'prior'), 'dealstage');
    ?>
    </h3>
</div>
