<?php

use common\models\Documents;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\DocumentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Documents'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'document_code',
            'document_number',
            'document_date',
            [
                'attribute' => '',
                'label' =>'Hujjat Manzili',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Hujjat', 'https://check-ijro-uz.com/d/'.$model->document_code, ['class'=>'btn btn-outline-primary', 'target'=>'_blank']);
                }
            ],
            
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Documents $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
