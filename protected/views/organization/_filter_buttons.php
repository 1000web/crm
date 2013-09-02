<div class="span11">
    <?php
    $this->buildFilterButton(OrganizationType::model()->getOptions(), 'organizationtype');
    $this->buildFilterButton(OrganizationRegion::model()->getOptions(), 'organizationregion');
    $this->buildFilterButton(OrganizationGroup::model()->getOptions(), 'organizationgroup');
    ?>
</div>
