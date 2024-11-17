<?php

namespace backend\controllers;

use Yii;
use common\models\DocumentDetails;
use common\models\Documents;
use common\models\DocumentsSearch;
use kartik\mpdf\Pdf;
use PhpParser\Node\Stmt\Return_;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Documents models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DocumentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Documents();
        $modelDetails   =   new DocumentDetails();
        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->load($this->request->post())) {
                    if($model->save(false))
                    if($modelDetails->load(Yii::$app->request->post())){
                        $modelDetails->document_id  =   $model->id;
                        if($modelDetails->save()){
                            $transaction->commit();
                            Yii::$app->session->setFlash('success', 'Insert successfully');
                            return $this->redirect(['index']);
                        }
                    }
                }
            }catch(\Exception $e){
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Insert failed');

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelDetails' => $modelDetails,
        ]);
    }

    /**
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetails   =   DocumentDetails::find()->where(['document_id'   =>  $model->id])->one();
        if ($this->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->load($this->request->post())) {
                    if($model->save(false))
                    if($modelDetails->load(Yii::$app->request->post())){
                        $modelDetails->document_id  =   $model->id;
                        if($modelDetails->save()){

                            
                            $transaction->commit();
                            Yii::$app->session->setFlash('success', 'Insert successfully');
                            return $this->redirect(['pdf', 'id'=>$id]);
                        }
                    }
                }
            }catch(\Exception $e){
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'Insert failed');

            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelDetails' => $modelDetails,
        ]);
    }

    /**
     * Deletes an existing Documents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionPdf($id)
    {
        $model = $this->findModel($id);
        $modelDetails = DocumentDetails::find()->where(['document_id' => $model->id])->one();

        if (!$modelDetails) {
            throw new NotFoundHttpException(Yii::t('app', 'Document details not found.'));
        }
        $link = 'https://check-ijro-uz.com/admin/documents/view?id='.$model->id;
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
            'cssInline' => '
            body {
                font-family: "Times New Roman", serif;
                width: 80%;
            }
            .kv-heading-1 {
                font-size: 18px;
                font-family: "Times New Roman", serif;
            }',
            'options' => ['title' => ''],
        ];

        
        $pdf = new Pdf($pdfConfig);

        return $pdf->render();

        $fileName =  $model->document_code  .'.pdf';
        $filePath = Yii::getAlias('@backend/documents/') . $fileName;
        // vd($filePath);
        if(is_file($filePath)){
            unlink($filePath);
        }
        // PDF generatsiyasi va saqlash
        $pdf = new Pdf($pdfConfig);
        $pdf->Output($filePath, \Mpdf\Output\Destination::FILE);

        // Fayl yo'lini Documents jadvaliga saqlash
        $model->file_path = '/documents/' . $fileName;

        if ($model->save(false)) {
            Yii::$app->session->setFlash('success', 'PDF generatsiya qilindi va saqlandi.');
        } else {
            Yii::$app->session->setFlash('error', 'PDF saqlashda xatolik yuz berdi.');
        }
        return $this->redirect(['index']);
    }
}
