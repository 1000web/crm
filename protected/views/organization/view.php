<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */

$this->addAttribute('organization_type_id',$model->organization_type->value);
$this->addAttribute('organization_group_id',$model->organization_group->value);
$this->addAttribute('organization_region_id',$model->organization_region->value);
$this->addAttribute('description');


echo $this->renderPartial('../detail_view', array(
    'dataProvider' => $model,
));

if (MyHelper::checkAccess('organizationcontact', 'view')) {
    echo '<h2>Контакты Организации</h2>';
    echo $this->renderPartial('../organizationcontact/index', array(
        'dataProvider' => $contact,
    ));
}
if (MyHelper::checkAccess('customer', 'view')) {
    echo '<h2>Клиенты Организации</h2>';
    echo $this->renderPartial('../customer/index', array(
        'dataProvider' => $customer,
    ));
}
if (MyHelper::checkAccess('deal', 'view')) {
    echo '<h2>Сделки Организации</h2>';
    echo $this->renderPartial('../deal/index', array(
        'dataProvider' => $deal,
    ));
}