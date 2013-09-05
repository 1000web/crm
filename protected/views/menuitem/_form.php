<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */
/* @var $form CActiveForm */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
));

echo $form->errorSummary($model);

echo $form->dropDownListRow($model, 'parent_id', MenuItem::model()->getOptions('id', array('key' => 'i', 'val' => 'title')), array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'menu_id', Menu::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'item_id', Item::model()->getOptions('id', 'title'), array('class' => 'input-block-level'));

echo $form->textFieldRow($model, 'prior', array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'visible', array(0 => 'Скрыто', 1 => 'Видимо'), array('class' => 'input-block-level'));

echo $form->dropDownListRow($model, 'guest_only', array(0 => 'Нет', 1 => 'Да'), array('class' => 'input-block-level'));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();