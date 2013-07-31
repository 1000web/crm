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

<div class="row">
<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Тип контрагента', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'Партнер', 'url'=>'#'),
                array('label'=>'Заказчик', 'url'=>'#'),
                array('label'=>'Поставщик', 'url'=>'#'),
                '---',
                array('label'=>'АтомСпецСервис', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>

<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Регион', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'Россия', 'url'=>'#'),
                array('label'=>'Украина', 'url'=>'#'),
                array('label'=>'Зарубежье', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>

<div class="btn-toolbar span2">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Группа контрагентов', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'1', 'url'=>'#'),
                array('label'=>'2', 'url'=>'#'),
                array('label'=>'3', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>
</div>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
