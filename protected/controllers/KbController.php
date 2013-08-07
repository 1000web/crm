<?php

class KbController extends Controller
{
    public $name = 'База знаний';

    public function actionIndex()
    {
        $this->render('index');
    }
}