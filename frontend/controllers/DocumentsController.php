<?php

namespace frontend\controllers;

use yii\base\Controller;

class DocumentsController extends Controller{

    public function actionView($id=null)
    {
        // $this->layout = false;
        return $this->render('view', ['id' => $id]);
    }
    public function actionPdf($id=null)
    {
        $id = \Yii::$app->request->getQueryParam('id');

        $model = $this->findModel($id);

        

        $content = $this->renderPartial('pdf', [
            'model' => $model,
        ]);

        
        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_UTF8, // leaner size using standard fonts
            'filename' => 'Заказ - '.$barcode.'.pdf',
            'content' => $content,
            #'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:16px}',
            'options' => [
                'title' => 'Factuur',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => ['Piroptom.uz | Код: '.$barcode.'|' . date('d.m.Y H:i:s', strtotime($model->created))],
                'SetFooter' => ['|Страница {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }
}
