<?php
/* @var $this OrganizationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Контрагенты',
);

$this->menu = $this->menuOperations('index');

?>

<table width="80%">
    <tr>
        <td width="170" rowspan="2">
            <img src="/images/organization.jpg" />
        </td>
        <td colspan="2">
            <h1>Контрагенты</h1>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Заключайте сделки с Контрагентами</h2>
            Контрагенты - это компании или корпоративные отделы, с которыми вы имеете деловые отношения.
        </td>
    </tr>
</table>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
