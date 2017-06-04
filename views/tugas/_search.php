<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_tugas') ?>

    <?= $form->field($model, 'tugas') ?>

    <?= $form->field($model, 'tgl_penugasan') ?>

    <?= $form->field($model, 'tgl_pengumpulan') ?>

    <?php // echo $form->field($model, 'pembimbing_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
