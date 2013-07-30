<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контрагенты',
);

$this->menu = $this->menuOperations('index');

?>

<table class="span-20">
    <tr>
        <td class="span-4">
            <img src="/images/organization-150x150.jpg" />
        </td>
        <td class="span-16">
            <h1>Контрагенты</h1>
            <h2>Заключайте сделки с Контрагентами</h2>
            Контрагенты - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.
        </td>
    </tr>
</table>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
