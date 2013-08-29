<?php

class GlossaryController extends Controller
{
    public function actionIndex()
    {
        $this->buildPageOptions();
        $this->render('index');
    }
}