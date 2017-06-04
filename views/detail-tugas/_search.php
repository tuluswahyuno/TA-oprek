<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailTugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-tugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tugas_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'tgl_pengumpulan') ?>

    <?= $form->field($model, 'file_tugas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
