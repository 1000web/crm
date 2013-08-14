<?php
/* @var $this GlossaryController */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>

<ul>
    <li><?php echo CHtml::link('Типы контактов', '/contacttype'); ?></li>
    <br/>
    <li><?php echo CHtml::link('Типы продукции', '/producttype'); ?></li>
    <li><?php echo CHtml::link('Продукция', '/product'); ?></li>
</ul>
