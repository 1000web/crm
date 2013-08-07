<?php
/* @var $this SiteController */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

/*
foreach($menu->itemsRell as $rel):
    echo 'item_id '.$rel->item_id . 'prior '.$rel->prior . ' visible ' .  $rel->visible.'<br>';
endforeach;

foreach($menu->items as $item):
    echo 'id '.$item->id.' value '.$item->value.'<br>';
endforeach;
/**/


/*
$sql = "
SELECT m.*, mi.*, i.*
FROM tbl_menu as m, tbl_menu_item as mi, tbl_item as i
WHERE m.value = 'home_menu'
AND mi.visible = 1
AND m.id = mi.menu_id
AND mi.item_id = i.id
ORDER BY mi.prior
";
$menu = Item::model()->findBySql($sql);
/**/




// создаем экземпляр  класса CDbCriteria
$criteria = new CDbCriteria;
// указываем алиас таблицы
//$criteria->alias = 'menu';
// условие то, что относится к WHERE
// можно использовать плейсхолдеры
$criteria->condition = "menu_id=3 AND visible=1"; //  AND NOT tbl_menu_item.parent_id
// параметры для плейсхолдеров
//$criteria->params = array(':menu_name' => );
// указываем индекс результирующего массива, полезная фишка, появилась с версии 1.1.5
// по умолчанию значение NULL и будут численный индекс начиная с 0
$criteria->index = 'prior';
// указываем как приджойнить другую(ие) таблицу(ы)
// джойним некую таблицу
//$criteria->join = 'LEFT JOIN `tbl_item` ON `tbl_item`.`id` = `item_id`';
$criteria->join = 'LEFT JOIN tbl_item ON tbl_item.id=item_id';
// максимальное количество записей которое может вернуть запрос
// если меньше 0, вернет все записи
$criteria->limit = '-1';
// сортировка
$criteria->order = 'prior ASC';
// поля для выборки, по умолчанию *
//$criteria->select = array('tbl_menu.id', 'tbl_menu_item.id', 'menu_id', 'item_id', 'parent_id', 'prior', 'visible');
$criteria->select = "*, tbl_item.*";
// если значение true то данные из внешних(связанных) таблицы будут
// выбраны одним запросом через JOIN. Работает только с отношениями в ActiveRecord
$criteria->together = true;
// отношения, работает только в ActiveRecord
//$criteria->with = array('menuItems', 'items');
$criteria->with = array('item');

//$menu = MenuItem::model()->findAll($criteria);

$dataProvider = new CActiveDataProvider('MenuItem',
    array('criteria' => $criteria)
);
$menu = $dataProvider->getData();

//print_r($menu->attributes);
/*
echo '<pre>';
print_r($menu);
echo '</pre>';
/**/

/**/
foreach($menu as $item){
    echo 'menu_id '.$item['menu_id'].'<br>';
    echo 'item_id '.$item['item_id'].'<br>';
    echo 'prior '.$item['prior'].'<br>';
    echo 'visible '.$item['visible'].'<br>';

    echo 'module '.$item['module'].'<br>';
    echo 'controller '.$item['controller'].'<br>';
    echo 'action '.$item['action'].'<br>';
    echo 'value '.$item['value'].'<br>';
    echo 'desc '.$item['description'].'<br>';

    echo '<br>';
}/**/



/*
public function getProposeList($user_id, $from = "", $num = "") {
    $cond = "fp.proposerUserId='$user_id'";
    $user_field = "fp.toUserId";

    if ($from === "" && $num !== "")
        $limit = "LIMIT $num";
    elseif ($from !== "" && $num !== "")
        $limit = "LIMIT " . $from . "," . $num;
    else
        $limit = "";

    $list = User::model()->with('country')->findAllBySql(
        "SELECT *
                FROM FriendPropose AS fp, User AS u
                WHERE $cond
                AND  u.id=$user_field
                $limit"
    );
    return $list;
}
/**/


/*
$menu = new CActiveDataProvider('Menu', array(
    'criteria' => array(
        'condition' => 'value=home_menu',
        //'order' => 'prior ASC',
        'with' => array('menuItems','items'),
    ),
));

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



