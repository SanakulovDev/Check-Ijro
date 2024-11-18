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
                            return $this->redirect(['index']);
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

    
}
