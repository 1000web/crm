<?php
/* @var $this DealController */
/* @var $model Deal */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'deal-form',
        'enableAjaxValidation' => false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'inner_number');
        echo $form->textField($model, 'inner_number', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'inner_number');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'external_number');
        echo $form->textField($model, 'external_number', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'external_number');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'open_date');
        echo $form->textField($model, 'open_date');
        echo $form->error($model, 'open_date');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'value');
        echo $form->textField($model, 'value', array('size' => 60, 'maxlength' => 255));
        echo $form->error($model, 'value');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'owner_id');
        echo $form->dropDownList($model, 'owner_id', Users::model()->getOptions('id','username'));
        echo $form->error($model, 'owner_id');
        ?>
    </div>

    <div class="row">
        <?php
        if(isset($_GET['oid'])) $values = Organization::model()->getOptions('id','value','value',$_GET['oid']);
        else $values = Organization::model()->getOptions();

        echo $form->labelEx($model, 'organization_id');
        echo $form->dropDownList($model, 'organization_id', $values);
        echo $form->error($model, 'organization_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'customer_id');
        echo $form->dropDownList($model, 'customer_id', Customer::model()->getOptions());
        echo $form->error($model, 'customer_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'deal_source_id');
        echo $form->dropDownList($model, 'deal_source_id', DealSource::model()->getOptions('id','value','prior'));
        echo $form->error($model, 'deal_source_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'deal_stage_id');
        echo $form->dropDownList($model, 'deal_stage_id', DealStage::model()->getOptions('id','value','prior'));
        echo $form->error($model, 'deal_stage_id');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'amount');
        echo $form->textField($model, 'amount', array('size' => 12, 'maxlength' => 12));
        echo $form->error($model, 'amount');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'probability');
        echo $form->textField($model, 'probability');
        echo $form->error($model, 'probability');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'close_date');
        echo $form->textField($model, 'close_date');
        echo $form->error($model, 'close_date');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'description');
        echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50));
        echo $form->error($model, 'description');
        ?>
    </div>

    <?php echo $this->submit_button($model->isNewRecord); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->