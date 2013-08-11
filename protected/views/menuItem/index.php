<?php
/* @var $this MenuItemController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <div class="row">
        <div class="btn-toolbar span2">
            <?php
            $options = Menu::model()->getOptions();
            $this->buildFilterButton($options, 'menu');
            ?>
        </div>
        <div class="btn-toolbar span2">
            <?php
            $options = MenuItem::model()->getOptions('parent_id','parent_id');
            $this->buildFilterButton($options, 'parent');
            ?>
        </div>
    </div>
<?php

$columns_list = array('menu_id', 'id', 'parent_id', 'prior', 'visible');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
