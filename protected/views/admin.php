<?php
/* @var $this Controller */
/* @var $this ->_model Model */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
    Можно использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> или
    <b>=</b>) в начале параметра поиска.</p>
<?php CHtml::link('Расширенный поиск', '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array('model' => $this->_model)); ?>
    </div><!-- search-form -->

<?php
$cols = $this->_model->getAvailableAttributes();
$cols[] = array('class' => 'CButtonColumn');

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'admin-grid',
    'dataProvider' => $this->_model->search(),
    'filter' => $this->_model,
    'columns' => $cols,
));