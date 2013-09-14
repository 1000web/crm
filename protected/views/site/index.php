<?php
/* @var $this SiteController */
/* @var $menu Menu */

foreach ($menu as $item) {
    ?>
    <div class="media">
        <div class="pull-left">
            <img class="media-object" src="/images/75x75/<?php echo $item['i']['controller']; ?>/index.jpg"
                 title="<?php echo $item['i']['value']; ?>" alt="<?php echo $item['i']['value']; ?>">
        </div>
        <div class="media-body">
            <h3 class="media-heading"><?php echo $item['i']['value']; ?></h3>

            <div class="media"><?php echo $item['i']['description']; ?>
                <?php
                if ($items = MenuItem::model()->getItemsArray($item['m']['value'], $item['id'])) {
                    $this->widget('bootstrap.widgets.TbMenu', array(
                        'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
                        'stacked' => false, // whether this is a stacked menu
                        'items' => $items,
                    ));
                }
                ?>
            </div>
        </div>
    </div>
<?php
} // foreach



