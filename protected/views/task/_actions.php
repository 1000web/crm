<div class="span11">
    <?php
    echo '<strong>ЗАДАЧА ' . $this->_model->task_stage->value . '</strong>: ';

    $task_active = $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Принять в работу',
            'type' => 'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'url' => array('view', 'id' => $this->_model->id, 'stage' => TaskStage::$STAGE_ACTIVE),
        ), true) . ' ';
    $task_frozen = $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Отложить',
            'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'url' => array('view', 'id' => $this->_model->id, 'stage' => TaskStage::$STAGE_FROZEN),
        ), true) . ' ';
    $task_failed = $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Провалить',
            'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'url' => array('view', 'id' => $this->_model->id, 'stage' => TaskStage::$STAGE_FAILED),
        ), true) . ' ';
    $task_done = $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Завершить',
            'type' => 'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'url' => array('view', 'id' => $this->_model->id, 'stage' => TaskStage::$STAGE_DONE),
        ), true) . ' ';

    switch ($this->_model->task_stage_id) {
        case TaskStage::$STAGE_NEW: // задача не начата
            echo $task_active;
            echo $task_frozen;
            echo $task_done;
            echo $task_failed;
            break;
        case TaskStage::$STAGE_FROZEN: // отложена
            echo $task_active;
            echo $task_done;
            echo $task_failed;
            break;
        case TaskStage::$STAGE_ACTIVE: // в работе
            echo $task_frozen;
            echo $task_done;
            echo $task_failed;
            break;
        case TaskStage::$STAGE_DONE: // завершена
            echo $task_active;
            break;
        case TaskStage::$STAGE_FAILED: // провалена
            echo $task_active;
            echo $task_frozen;
            echo $task_done;
            break;
    }
    ?>
</div>
<br/><br/>
