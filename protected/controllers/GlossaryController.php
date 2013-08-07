<?php

class GlossaryController extends Controller
{
    public $name = 'Справочники';

    public function actionIndex()
    {
        $this->render('index');
    }
}