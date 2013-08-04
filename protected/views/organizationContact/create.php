<?php
/* @var $this OrganizationContactController */
/* @var $model OrganizationContact */

$this->breadcrumbs = array(
    'Контакты Организаций' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Контакт Организации</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>