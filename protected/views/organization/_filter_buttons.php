<div class="span11">
    <h3>Фильтры
    <?php
    $this->buildFilterButton(OrganizationType::model()->getOptions(), 'organizationtype');
    $this->buildFilterButton(OrganizationRegion::model()->getOptions(), 'organizationregion');
    $this->buildFilterButton(OrganizationGroup::model()->getOptions(), 'organizationgroup');
    ?>
    </h3>
</div>
