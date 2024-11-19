<?php

use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Documents $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'document_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'document_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'document_date')->widget(DatePicker::class, [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'resolution_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'resolution_date')->widget(DatePicker::class, [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]) ?>
        </div>
       
        <div class="col-md-2">
            <?= $form->field($model, 'issuer_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'executor_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'signing_organization')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'validity_period_start')->widget(DatePicker::class, [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'validity_period_end')->widget(DatePicker::class, [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDetails, 'mayor_of_the_city')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($modelDetails, 'archive_head')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <h3>Hujjat Asosiy Contenti</h3>

    <div class="row">
        <div class="col-md-12">
        <?= $form->field($modelDetails, 'main_content')->widget(CKEditor::class, [
            'options' => ['rows' => 6],
            'preset' => 'custom',
            'clientOptions' => [
                'extraPlugins' => 'basicstyles,justify', // Underline va align funksiyalari uchun plaginni faollashtirish
                'toolbar' => [
                    ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Underline']], // Matn formatlash tugmalari
                    ['name' => 'paragraph', 'items' => ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']], // Matnni tekislash tugmalari
                ],
                'removeButtons' => '', // Kerakli tugmalarni o‘chirishga yo‘l qo‘ymaslik
            ],
        ]) ?>
        </div>
    </div>
    <h3>Hujjat Qaror Qismi</h3>

    <div class="row">
        <div class="col-md-12">
           <?= $form->field($modelDetails, 'resolution_content')->widget(CKEditor::class, [
            'options' => ['rows' => 6],
            'preset' => 'custom',
            'clientOptions' => [
                'extraPlugins' => 'basicstyles,justify', // Underline va align funksiyalari uchun plaginni faollashtirish
                'toolbar' => [
                    ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Underline']], // Matn formatlash tugmalari
                    ['name' => 'paragraph', 'items' => ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']], // Matnni tekislash tugmalari
                ],
                'removeButtons' => '', // Kerakli tugmalarni o‘chirishga yo‘l qo‘ymaslik
            ],
        ]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
