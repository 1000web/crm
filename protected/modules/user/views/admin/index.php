<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('/user'),
    UserModule::t('Manage'),
);

$this->menu = array(
    array('label' => UserModule::t('Create User'), 'url' => array('create')),
    array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
    array('label' => UserModule::t('Manage Profile Field'), 'url' => array('profileField/admin')),
    array('label' => UserModule::t('List User'), 'url' => array('/user')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});	
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->h1 = UserModule::t("Manage Users");

?>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php

$columns = array(
    array(
        'name' => 'id',
        'type' => 'raw',
        'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
    ),
    array(
        'name' => 'username',
        'type' => 'raw',
        'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
    ),
    array(
        'name' => 'email',
        'type' => 'raw',
        'value' => 'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
    ),
    'create_at',
    'lastvisit_at',
    array(
        'name' => 'superuser',
        'value' => 'User::itemAlias("AdminStatus",$data->superuser)',
        'filter' => User::itemAlias("AdminStatus"),
    ),
    array(
        'name' => 'status',
        'value' => 'User::itemAlias("UserStatus",$data->status)',
        'filter' => User::itemAlias("UserStatus"),
    ),
    array(
        'class' => 'bootstrap.widgets.TbButtonColumn',
    ),
);

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped bordered condensed',
    'template' => '{summary}{items}{pager}',
    'enablePagination' => true,
    'columns' => $columns,
    'pager' => array(
        //'maxButtonCount' => Yii::app()->controller->isMobile?4:10,
        'maxButtonCount' => 10,
        'class' => 'bootstrap.widgets.TbPager',
    ),
));

