<?php
/* @var $this ContacttypeController */
/* @var $this->_model ContactType */
/* @var $form CActiveForm */

    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'verticalForm',
        'htmlOptions' => array(
            'class' => 'well',
        ),
    ));
    echo $form->errorSummary($this->_model);

    echo $form->textFieldRow($this->_model, 'value', array('maxlength' => 255, 'class' => 'input-block-level'));

    echo $form->textAreaRow($this->_model, 'description', array('rows' => 4, 'class' => 'input-block-level'));

    echo $this->submit_button($this->_model->isNewRecord);

    $this->endWidget();

