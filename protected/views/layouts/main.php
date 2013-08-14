<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>

    <?php /*
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/ >
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->
    /**/?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<div class="container" id="page">
    <?php
    if(isset($this->top_menu_items)) {
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'encodeLabel' => false,
                    'items' => $this->top_menu_items,
                ),
            ),
        ));
    }
    // если непусто, то показываем крошки
    if($this->breadcrumbs) {
		$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		));
    }
    ?><!-- breadcrumbs -->

<div class='row'>
    <div class='span2'>
    <?php
    if(isset($this->header_image)) echo "<img src='" . $this->header_image . "' />";
    ?>
    </div>
    <div class='span10'>
    <?php
    if(isset($this->h1)) echo "<h1>" . $this->h1 . "</h1>\n";
    if(isset($this->description)) echo "<p>" . $this->description . "</p>";
    if(isset($this->menu) AND $this->menu) {
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'items' => $this->menu,
        ));
    }
    ?>
    </div>
</div><!-- page_header -->

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <a href="/site/about">О программе</a>
        &copy; <?php echo date('Y'); ?> <a href="http://atomspetsservice.ru/" target="_blank">АтомСпецСервис</a><br/>
        <a href="http://1000web.ru" target="_blank">Разработка компании 1000web.ru</a>
    </div>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
