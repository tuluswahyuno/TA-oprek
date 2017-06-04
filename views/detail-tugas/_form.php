<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailTugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-tugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tugas_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'tgl_pengumpulan')->textInput() ?>

    <?= $form->field($model, 'file_tugas')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
