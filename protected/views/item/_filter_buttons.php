<div class="row">
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(Item::model()->getOptions('parent_id', 'parent_id'), 'itemparent');
        ?>
    </div>
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(Item::model()->getOptions('module', 'module'), 'itemmodule');
        ?>
    </div>
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(Item::model()->getOptions('controller', 'controller'), 'itemcontroller');
        ?>
    </div>
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(Item::model()->getOptions('action', 'action'), 'itemaction');
        ?>
    </div>
</div>
