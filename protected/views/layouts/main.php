<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items' => array(
                array('label' => 'Главная', 'url' => array('/site/index')),
                array('label' => 'Контакты', 'url' => array('/customer')),
                array('label' => 'Контрагенты', 'url' => array('/organization')),
                array('label' => 'Операции', 'url' => array('/task')),
                array('label' => 'Сделки', 'url' => array('/deal')),
                array('label' => 'Справочники', 'url' => array('/glossary')),
                //array('label' => 'База знаний', 'url' => array('/kb')),
                array('label' => 'Войти', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Профиль', 'url' => array('/user/profile'), 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/user/logout'), 'visible' => !Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        &copy; <?php echo date('Y'); ?> <a href="http://atomspetsservice.ru/" target="_blank">АтомСпецСервис</a><br/>
        Разработка <a href="http://1000web.ru" target="_blank">1000web.ru</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
