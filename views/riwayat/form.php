<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */
/* @var $form ActiveForm */
?>
<div class="riwayat-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_pendaftaran') ?>
        <?= $form->field($model, 'jenjang') ?>
        <?= $form->field($model, 'nama_sekolah') ?>
        <?= $form->field($model, 'tahun_lulus') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- riwayat-form -->
