<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>
    <div class="row">
        <div class="btn-toolbar span2">
            <?php
            $options = Item::model()->getOptions('parent_id','parent_id');
            $this->buildFilterButton($options, 'itemparent');
            ?>
        </div>
        <div class="btn-toolbar span2">
            <?php
            $options = Item::model()->getOptions('module','module');
            $this->buildFilterButton($options, 'itemmodule');
            ?>
        </div>
        <div class="btn-toolbar span2">
            <?php
            $options = Item::model()->getOptions('controller','controller');
            $this->buildFilterButton($options, 'itemcontroller');
            ?>
        </div>
        <div class="btn-toolbar span2">
            <?php
            $options = Item::model()->getOptions('action','action');
            $this->buildFilterButton($options, 'itemaction');
            ?>
        </div>
    </div>
<?php
$columns_list = array('id', 'parent_id', 'module', 'controller', 'action', 'icon', 'value', 'title');

echo $this->renderPartial('../grid_view', array(
    'dataProvider' => $dataProvider,
    'columns_list' => $columns_list,
));
