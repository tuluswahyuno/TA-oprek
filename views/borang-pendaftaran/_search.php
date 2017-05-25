<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borang-pendaftaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'prodi') ?>

    <?= $form->field($model, 'fakultas') ?>

    <?php // echo $form->field($model, 'pembimbing_akademik') ?>

    <?php // echo $form->field($model, 'nip') ?>

    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'tahun_akademik') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status_marital') ?>

    <?php // echo $form->field($model, 'alamat_asal') ?>

    <?php // echo $form->field($model, 'alamat_kost') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'hobi') ?>

    <?php // echo $form->field($model, 'url_blog') ?>

    <?php // echo $form->field($model, 'pengalaman_it') ?>

    <?php // echo $form->field($model, 'kemampuan_khusus') ?>

    <?php // echo $form->field($model, 'status_validasi') ?>

    <?php // echo $form->field($model, 'divisi_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
