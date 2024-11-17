<?php

namespace frontend\controllers;

use yii\base\Controller;

class DocumentsController extends Controller{

    public function actionView($id=null)
    {
        // $this->layout = false;
        return $this->render('view', ['id' => $id]);
    }
}