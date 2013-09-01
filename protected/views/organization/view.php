<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */

/*
$attr = array(
//        array('name' => 'id', 'label' => '#'),
        //array('name' => 'organization_type_id', 'label' => 'Тип'),
        //array('name' => 'organizationType->value', 'label' => 'Тип'),
        array('name' => 'organization_type_id', 'label' => 'Тип', 'value' => $model->organizationType->value),
        array('name' => 'organization_group_id', 'label' => 'Группа', 'value' => $model->organizationGroup->value),
        array('name' => 'organization_region_id', 'label' => 'Регион', 'value' => $model->organizationRegion->value),
        //array('name' => 'value', 'label' => 'Название'),
        array('name' => 'description', 'label' => 'Описание'),
);/**/
$this->addAttributes(array(
    'organization_type_id',
    'organization_group_id',
    'organization_region_id',
    'description',
));

echo $this->renderPartial('../detail_view', array(
    'dataProvider' => $model,
));


if ($this->checkAccess('organizationcontact', 'view')) {
    echo '<h2>Контакты Организации</h2>';
    echo $this->renderPartial('../organizationcontact/index', array(
        'dataProvider' => $contact,
    ));
}

if ($this->checkAccess('customer', 'view')) {
    echo '<h2>Клиенты Организации</h2>';
    echo $this->renderPartial('../customer/index', array(
        'dataProvider' => $customer,
    ));
}

if ($this->checkAccess('deal', 'view')) {
    echo '<h2>Сделки Организации</h2>';
    echo $this->renderPartial('../deal/index', array(
        'dataProvider' => $deal,
    ));
}