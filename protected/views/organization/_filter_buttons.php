<div class="row">
    <div class="btn-toolbar span3">
        <?php
        $this->buildFilterButton(OrganizationType::model()->getOptions(), 'organizationtype');
        ?>
    </div>
    <div class="btn-toolbar span3">
        <?php
        $this->buildFilterButton(OrganizationRegion::model()->getOptions(), 'organizationregion');
        ?>
    </div>
    <div class="btn-toolbar span3">
        <?php
        $this->buildFilterButton(OrganizationGroup::model()->getOptions(), 'organizationgroup');
        ?>
    </div>
</div>
