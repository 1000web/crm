<?php
/* @var $this GlossaryController */

$menu_name = 'glossary_menu';
$menu = MenuItem::model()->getItems($menu_name);

echo '<div class="container">';
FOREACH ($menu as $item) :
    ?>
    <div class="row">
    <div class="span1"><img src="/images/75x75/<?php echo $item['i']['controller']; ?>/index.jpg"/></div>
    <div class="span11">
    <h3><?php echo $item['i']['value']; ?></h3>
    <p><?php echo $item['i']['description']; ?></p>
    <?php
    //if ($item['i']['description']) echo "<p>" . $item['i']['description'] . "</p>";

    if ($items = MenuItem::model()->getItemsArray($menu_name, $item['id'])) {
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'items' => $items,
        ));
    }
    echo '</div></div>';
ENDFOREACH;
echo '</div>';


