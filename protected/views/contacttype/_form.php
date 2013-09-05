<?php
/* @var $this ContacttypeController */
/* @var $model ContactType */
/* @var $form CActiveForm */

    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'htmlOptions' => array(
            'class' => 'well',
        ),
    ));
    echo $form->errorSummary($model);

    echo $form->textFieldRow($model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

    echo $form->textAreaRow($model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

    echo $this->submit_button($model->isNewRecord);

    $this->endWidget();

