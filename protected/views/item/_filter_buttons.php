<div class="span11">
    <?php
    $this->buildFilterButton(Item::model()->getOptions('parent_id', 'parent_id'), 'itemparent');
    $this->buildFilterButton(Item::model()->getOptions('module', 'module'), 'itemmodule');
    $this->buildFilterButton(Item::model()->getOptions('controller', 'controller'), 'itemcontroller');
    $this->buildFilterButton(Item::model()->getOptions('action', 'action'), 'itemaction');
    ?>
</div>
