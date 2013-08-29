<?php
/* @var $this SiteController */

$menu_name = 'home_menu';
$menu = MenuItem::model()->get_menu($menu_name);

foreach($menu as $item){
    echo '<ul>';
    echo '<li>id '.$item['id'].'<br>';
    echo '<li>item_id '.$item['item_id'].'<br>';
    echo '<li>parent_id '.$item['parent_id'].'<br>';

    $inner_menu = MenuItem::model()->get_menu($menu_name, $item['id']);
    foreach($inner_menu as $i){
        echo '<ul>';
        echo '<li>id '.$i['id'].'<br>';
        echo '<li>item_id '.$i['item_id'].'<br>';
        echo '<li>parent_id '.$i['parent_id'].'<br>';
        echo '</ul>';
        echo '<br />';
    }
    //echo 'module '.$item['module'].'<br>';
    //echo 'controller '.$item['controller'].'<br>';
    //echo 'action '.$item['action'].'<br>';
    //echo 'value '.$item['value'].'<br>';
    //echo 'desc '.$item['description'].'<br>';
    echo '</ul>';
    echo '<br />';
}

