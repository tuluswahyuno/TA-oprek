<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */
/* @var $form ActiveForm */
?>
<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_user') ?>
        <?= $form->field($model, 'nama') ?>
        <?= $form->field($model, 'prodi') ?>
        <?= $form->field($model, 'fakultas') ?>
        <?= $form->field($model, 'pembimbing_akademik') ?>
        <?= $form->field($model, 'nip') ?>
        <?= $form->field($model, 'semester') ?>
        <?= $form->field($model, 'tahun_akademik') ?>
        <?= $form->field($model, 'tempat_lahir') ?>
        <?= $form->field($model, 'tanggal_lahir') ?>
        <?= $form->field($model, 'jenis_kelamin') ?>
        <?= $form->field($model, 'agama') ?>
        <?= $form->field($model, 'status_marital') ?>
        <?= $form->field($model, 'alamat_asal') ?>
        <?= $form->field($model, 'alamat_kost') ?>
        <?= $form->field($model, 'no_hp') ?>
        <?= $form->field($model, 'hobi') ?>
        <?= $form->field($model, 'url_blog') ?>
        <?= $form->field($model, 'pengalaman_it') ?>
        <?= $form->field($model, 'kemampuan_khusus') ?>
        <?= $form->field($model, 'status_validasi') ?>
        <?= $form->field($model, 'divisi_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- mahasiswa-form -->
