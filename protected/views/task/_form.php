<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */

//Yii::app()->bootstrap->registerAssetJs('locales/bootstrap-datepicker.ru.js');

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array(
        //'class'=>'form-inline',
        'class' => 'well'
    ),
));

echo $form->errorSummary($model);

echo $form->datepickerRow($model, 'date', array(
    'class' => 'span2 text-center',
    'append' => '<i class="icon-calendar"></i>',
    'options' => array(
        'format' => 'dd-mm-yyyy',
        'viewMode' => 1,
        'autoclose' => true,
    )
));
echo $form->timepickerRow($model, 'time', array(
    'class' => 'span2 text-center',
    'append' => '<i class="icon-time"></i>',
    'options' => array(
        'showMeridian' => false,
        'minuteStep' => 1,
    ),
    ));
//$this->widget('bootstrap.widgets.TbButton', array('icon'=>'icon-time', 'disabled' => true));

echo $form->dropDownListRow($model, 'user_id', Users::model()->getOptions('id', 'username'), array('class' => 'input-block-level'));
/*
$datetime = date('H:i:s', $model->datetime);
echo $form->timepickerRow($model, 'datetime', array('class' => 'inline'));
/**/

echo $form->dropDownList($model, 'task_type_id', TaskType::model()->getOptions(), array('class' => 'input-block-level'));

echo $form->textField($model, 'value', array(
    'maxlength' => 255,
    'class' => 'input-block-level',
    'placeholder' => $model->getLabel('value'),
));
echo $form->textArea($model, 'description', array('rows' => 4,
    'class' => 'input-block-level',
    'placeholder' => $model->getLabel('description'),
));

echo $this->submit_button($model->isNewRecord);

$this->endWidget();