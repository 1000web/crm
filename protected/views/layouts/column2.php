<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="row">
        <div class="span10">
            <div id="content">
                <?php echo $content; ?>
            </div>
            <!-- content -->
        </div>
        <div class="span2">
            <div id="sidebar">
                <?php
                /*
                $this->beginWidget('zii.widgets.CPortlet', array(
                        'title'=>'Операции',
                    ));
                    $this->widget('bootstrap.widgets.TbMenu', array(
                        'items'=>$this->menu,
                        'htmlOptions'=>array('class'=>'operations'),
                    ));
                    $this->endWidget();/**/

                if ($this->menu) {

                    $this->widget('bootstrap.widgets.TbMenu', array(
                        'type' => 'list',
                        'items' => CMap::mergeArray(
                            array(array('label' => 'Операции')),
                            $this->menu
                        ),
                        //'items' => $this->menu,
                        /*
                        'items' => array(
                            array('label'=>'Операции'),
                            array('label'=>'Home', 'icon'=>'home', 'url'=>'#', 'active'=>true),
                            array('label'=>'Library', 'icon'=>'book', 'url'=>'#'),
                            array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
                            array('label'=>'ANOTHER LIST HEADER'),
                            array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
                            array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
                            array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
                        ),/**/
                    ));
                }

                ?>
            </div>
            <!-- sidebar -->
        </div>
    </div>
<?php $this->endContent(); ?>