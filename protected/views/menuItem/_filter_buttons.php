<div class="row">
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(Menu::model()->getOptions(), 'menu');
        ?>
    </div>
    <div class="btn-toolbar span2">
        <?php
        $this->buildFilterButton(MenuItem::model()->getOptions('parent_id','parent_id'), 'parent');
        ?>
    </div>
</div>
