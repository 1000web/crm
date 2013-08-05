<?php
/* @var $this SiteController */

/*
foreach($menu->itemsRell as $rel):
    echo 'item_id '.$rel->item_id . 'prior '.$rel->prior . ' visible ' .  $rel->visible.'<br>';
endforeach;

foreach($menu->items as $item):
    echo 'id '.$item->id.' value '.$item->value.'<br>';
endforeach;
/**/

$items = array();
$keys_menuItems = array(
    'parent_id', 'prior', 'visible',
);
foreach($menu->menuItems as $item) {
    foreach($keys_menuItems as $key) {
        $items[$item['item_id']][$key] = $item[$key];
    }
}

$keys_items = array(
    'title', 'h1', 'module', 'controller', 'action', 'value', 'description',
);
foreach($menu->items as $item) {
    foreach($keys_items as $key) {
        $items[$item['id']][$key] = $item[$key];
    }
}
/**/
echo '<pre>';
print_r($items);
echo '</pre>';
/**/
?>
<div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'buttons'=>array(
        array('label'=>'Action','url' => '/site/test',
            'items'=>array(
            array('label'=>'Action', 'url'=>'#'),
            array('label'=>'Another action', 'url'=>'#'),
            array('label'=>'Something else', 'url'=>'#'),
            '---',
            array('label'=>'Separate link', 'url'=>'#'),
        )),
    ),
)); ?>
</div>


<div class="btn-group">
    <button type="button" class="btn btn-default" url="/customer/index">Customer</button>
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="/customer/create">Create</a></li>
        <li><a href="/customer/index">Index</a></li>
        <li><a href="/customer/admin">Manage</a></li>
        <!--li class="divider"></li>
        <li><a href="#">Separated link</a></li-->
    </ul>
</div>

<?php

/*
echo '<br><br><br><br>';

echo '<ul>';
foreach($menu->menuItems as $item) {
    //echo 'id '.$item->id.' value '.$item->value.'<br>';
    echo '<li>';
    echo 'parent ' . $item['parent'].'<br>';
    echo 'item_id ' . $item['item_id'].'<br>';
    echo 'prior ' . $item['prior'].'<br>';
    echo 'visible ' . $item['visible'].'<br>';
    echo '</li>';
}
echo '</ul>';

echo '<ul>';
foreach($menu->items as $item) {
    //echo 'id '.$item->id.' value '.$item->value.'<br>';
    echo '<li>';
    echo 'id ' . $item['id'].'<br>';
    echo 'title ' . $item['title'].'<br>';
    echo 'h1 ' . $item['h1'].'<br>';
    echo 'url ' . $item['controller'] . '/' . $item['action'].'<br>';
    //echo '' . $item[''].'<br>';
    echo 'value ' . $item['value'].'<br>';
    echo 'desc ' . $item['description'].'<br>';
    echo '</li>';
}
echo '</ul>';
/**/


/*
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $menu['items'],
    'template' => "{items}",
    'columns' => array(
//        array('name' => 'organization', 'header' => 'Организация', 'value' => '$data->organization->value'),
        array('name' => 'id', 'header' => $this->attributeLabels('id')),
        array('name' => 'parent_id', 'header' => $this->attributeLabels('parent_id')),
        array('name' => 'value', 'header' => $this->attributeLabels('value')),
        array('name' => 'description', 'header' => $this->attributeLabels('description')),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array(
                'style' => 'width: 50px',
            ),
        )
    ),
));/**/


?>



