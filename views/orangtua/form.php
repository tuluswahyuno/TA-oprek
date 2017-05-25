<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataOrangTua */
/* @var $form ActiveForm */
?>
<div class="orangtua-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_pendaftaran') ?>
        <?= $form->field($model, 'nama_ayah') ?>
        <?= $form->field($model, 'nama_ibu') ?>
        <?= $form->field($model, 'pekerjaan_ayah') ?>
        <?= $form->field($model, 'pekerjaan_ibu') ?>
        <?= $form->field($model, 'pendidikan_ayah') ?>
        <?= $form->field($model, 'pendidikan_ibu') ?>
        <?= $form->field($model, 'alamat_ayah') ?>
        <?= $form->field($model, 'alamat_ibu') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- orangtua-form -->
