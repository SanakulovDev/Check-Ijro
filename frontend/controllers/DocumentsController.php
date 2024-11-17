<?php

namespace frontend\controllers;

use common\models\Documents;
use yii\web\Controller;

class DocumentsController extends Controller{

    public function actionView($id=null)
    {
        $model  =   Documents::findOne($id);
        // $this->layout = false;
        return $this->render('view', ['model'   =>  $model]);
    }
}