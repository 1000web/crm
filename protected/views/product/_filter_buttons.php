<div class="span11">
    <h3>Фильтры
    <?php
    $this->buildFilterButton(ProductType::model()->getOptions(), 'producttype');
    ?>
    </h3>
</div>
