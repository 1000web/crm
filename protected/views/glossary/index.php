<?php
/* @var $this GlossaryController */

$this->breadcrumbs=array(
	'Справочники',
);
?>
<h1>Справочники</h1>

<ul>
    <li><?php echo CHtml::link('Типы задач', '/taskType'); ?></li>
    <li><?php echo CHtml::link('Типы контактов', '/contactType'); ?></li>
    <li><?php echo CHtml::link('Типы продукции', '/productType'); ?></li>
    <li><?php echo CHtml::link('Типы организаций', '/organizationType'); ?></li>
    <li><?php echo CHtml::link('Регионы организаций', '/organizationRegion'); ?></li>
    <li><?php echo CHtml::link('Группы организаций', '/organizationGroup'); ?></li>
</ul>
