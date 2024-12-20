<?php

namespace frontend\controllers;

use common\models\DocumentDetails;
use common\models\Documents;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use kartik\mpdf\Pdf;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DocumentsController extends Controller{

    public function actionView($code=null)
    {
        $model      =   Documents::find()->where(['document_code'    =>$code])->one();
        $pdf_url = '';
        if($model){
            $pdf_url    =   Url::base(true).'/documents/pdf?code='.$code; 
        }

        // $this->layout = false;
        // vd($pdf_url);
        return $this->render('view', [
            'model'   =>  $model, 
            'pdfUrl'   =>  $pdf_url
        ]);
    }

    public function actionPdf($code)
    {
        $model = $this->findModelByCode($code);
        $modelDetails = DocumentDetails::find()
            ->where(['document_id' => $model->id])
            ->one();

        if (!$modelDetails) {
            throw new NotFoundHttpException(Yii::t('app', 'Document details not found.'));
        }
        $link = Url::base(true).'/d/'.$model->document_code;
        $qrResult = Builder::create()
        ->data($link)
        ->encoding(new Encoding('UTF-8'))
        // ->errorCorrectionLevel(new ErrorCorrectionLevelLow())
        ->size(100)
        ->build();

        $qrImageData = $qrResult->getDataUri(); // Base64 formatda QR-kod
        
        $img = '/img/Emblem_of_Uzbekistan.svg';
        $headerLogo = Yii::getAlias('@webroot').'/img/pdf_header.png';
        
        $content = $this->renderPartial('pdf', [
            'model' => $model,
            'modelDetails' => $modelDetails,
            'img' => $img,
            'headerLogo' => $headerLogo,
            'qrImageData' => $qrImageData,
        ]);

        $pdfConfig = [
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'filename' => md5(time()) . ".pdf",
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.css',
            'marginTop' => 3,    // Tepadan bo‘sh joyni olib tashlash
            'marginBottom' => 0,
            'cssInline' => '
            body {
                font-family: "Times New Roman", serif;
                width: 100%;
                font-size: 15px;
                color: #000;
                font-weight: 900;
            }
            ',
            'options' => ['title' => ''],
        ];

        
        $pdf = new Pdf($pdfConfig);

        return $pdf->render();
    }
    protected function findModel($id)
    {
        if (($model = Documents::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    protected function findModelByCode($code)
    {
        if (($model = Documents::findOne(['document_code' => $code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }



    public function actionVerifyRecaptcha()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $recaptcha = Yii::$app->request->post('g-recaptcha-response');
        $secret = Yii::$app->params['recatchaSecretKey']; // O'zingizning secret key'ingizni qo'ying

        $client = new \yii\httpclient\Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://www.google.com/recaptcha/api/siteverify')
            ->setData(['secret' => $secret, 'response' => $recaptcha])
            ->send();

        if ($response->isOk && $response->data['success']) {
            // Foydalanuvchini tasdiqlangan deb belgilash
            Yii::$app->session->set('isHuman', true);

            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'isHuman',
                'value' => true,
                'expire' => time() + 3600 * 24 * 30, // 30 kun
            ]));

            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }
    
}
