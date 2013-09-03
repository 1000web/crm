<?php
/* @var $this SiteController */

$menu_name = 'home_menu';
$menu = MenuItem::model()->get_menu($menu_name);

echo '<div class="container">';
foreach ($menu as $item) :
    ?>
    <div class="row">
    <div class="span1"><img src="/images/75x75/<?php echo $item['i']['controller']; ?>/index.jpg"/></div>
    <div class="span11">
    <h3><?php echo $item['i']['value']; ?></h3>
    <?php
    if ($item['i']['description']) echo "<p>" . $item['i']['description'] . "</p>";
    $inner_menu = MenuItem::model()->get_menu($menu_name, $item['id']);
    $links = array();
    foreach ($inner_menu as $ii) {
        if (empty($ii['i']['module'])) {
            if ($this->checkAccess($ii['i']['controller'], $ii['i']['action'])) {
                $links[] = array(
                    'url' => '/' . $ii['i']['controller'] . '/' . $ii['i']['action'],
                    'icon' => $this->action_icon($ii['i']['action']),
                    'label' => $ii['i']['value'],
                );
            }
        } else {
            if ($this->checkAccess($ii['i']['module'], $ii['i']['controller'], $ii['i']['action'])) {
                $links[] = array(
                    'url' => '/' . $ii['i']['module'] . '/' . $ii['i']['controller'] . '/' . $ii['i']['action'],
                    'icon' => $this->action_icon($ii['i']['action']),
                    'label' => $ii['i']['value'],
                );
            }
        }
    }
    if ($links) {
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'items' => $links,
        ));
    }
    echo '</div></div>';
ENDFOREACH;
echo '</div>';


