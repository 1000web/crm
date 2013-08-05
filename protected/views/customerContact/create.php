<?php
/* @var $this CustomerContactController */
/* @var $model CustomerContact */

$this->breadcrumbs = array(
    'Контакты Клиентов' => array('index'),
    'Создать',
);

$this->menu = $this->menuOperations('create');

?>

    <h1>Создать Контакт Клиента</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>