<?php
/* @var $this OrganizationController */
/* @var $model Organization */
/* @var $contact OrganizationContact */
/* @var $customer Customer */
/* @var $deal Deal */

$this->addAttribute('organization_type_id',$model->organizationType->value);
$this->addAttribute('organization_group_id',$model->organizationGroup->value);
$this->addAttribute('organization_region_id',$model->organizationRegion->value);
$this->addAttribute('description');


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