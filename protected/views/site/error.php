<?php
/* @var $this SiteController */
/* @var $error array */

if(!isset($model)) $this->buildPageOptions();
else $this->buildPageOptions($model);

?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>