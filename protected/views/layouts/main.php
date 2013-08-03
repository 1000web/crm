<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

    <!-- blueprint CSS framework -->
    <!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/ -->
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
                //array('label' => 'Главная', 'url' => array('/site/index')),
                array('label' => 'Клиенты',
                    'items' => array(
                        array('label' => 'Список клиентов', 'url' => array('/customer/index')),
                        array('label' => 'Контакты клиентов', 'url' => array('/customerContact/index')),
                        array('label' => 'Создать клиента', 'url' => array('/customer/create')),
                        ),
                ),
                array('label' => 'Организации',
                    'items' => array(
                        array('label' => 'Список организаций', 'url' => array('/organization/index')),
                        array('label' => 'Создать организацию', 'url' => array('/organization/create')),
                    ),
                ),
                array('label' => 'Операции',
                    'items' => array(
                        array('label' => 'Список операций', 'url' => array('/task/index')),
                        array('label' => 'Создать операцию', 'url' => array('/task/create')),
                    ),
                ),
                array('label' => 'Сделки',
                    'items' => array(
                        array('label' => 'Список сделок', 'url' => array('/deal/index')),
                        array('label' => 'Создать сделку', 'url' => array('/deal/create')),
                    ),
                ),
                array('label' => 'Справочники',
                    'items' => array(
                        array('label' => 'Контрагенты',
                            'items' => array(
                                array('label' => 'Типы организаций', 'url' => array('/organizationType/index')),
                                array('label' => 'Регионы организаций', 'url' => array('/organizationRegion/index')),
                                array('label' => 'Группы организаций', 'url' => array('/organizationGroup/index')),
                                array('label' => 'Контакты организаций', 'url' => array('/organizationContact/index')),
                            ),
                        ),
                        array('label' => 'Типы контактов', 'url' => array('/contactType/index')),
                        array('label' => 'Типы операций', 'url' => array('/taskType/index')),
                    ),
                ),
                //array('label' => 'База знаний', 'url' => array('/kb/index')),
                array('label' => 'Войти', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Профиль', 'visible' => !Yii::app()->user->isGuest,
                    'items' => array(
                        array('label' => 'Профиль', 'url' => array('/user/profile/profile')),
                        array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/user/logout')),
                    ),
                ),

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
