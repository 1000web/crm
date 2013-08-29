<div class="row">
    <div class="btn-toolbar span3">
        <?php
        // 'id','value','prior'
        $this->buildFilterButton(DealSource::model()->getOptions('id','value','prior'), 'dealsource');
        ?>
    </div>
    <div class="btn-toolbar span3">
        <?php
        // 'id','value','prior'
        $this->buildFilterButton(DealStage::model()->getOptions('id','value','prior'), 'dealstage');
        ?>
    </div>
</div>
