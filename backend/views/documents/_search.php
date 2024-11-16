<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DocumentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'document_code') ?>

    <?= $form->field($model, 'document_date') ?>

    <?= $form->field($model, 'resolution_date') ?>

    <?= $form->field($model, 'resolution_number') ?>

    <?php // echo $form->field($model, 'issuer_name') ?>

    <?php // echo $form->field($model, 'executor_name') ?>

    <?php // echo $form->field($model, 'signing_organization') ?>

    <?php // echo $form->field($model, 'validity_period_start') ?>

    <?php // echo $form->field($model, 'validity_period_end') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
