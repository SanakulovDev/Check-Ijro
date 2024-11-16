<?php

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
            <?= $form->field($model, 'document_date')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'resolution_date')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'resolution_number')->textInput(['maxlength' => true]) ?>
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
            <?= $form->field($model, 'validity_period_start')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'validity_period_end')->textInput() ?>
        </div>

        <h3>Hujjat Contenti</h3>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
