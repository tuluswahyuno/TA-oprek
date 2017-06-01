<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pembimbing;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="divisi-form">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM DIVISI UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>

            <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'divisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pembimbing_id')
    ->label('Nama Pembimbing')
    ->dropDownList(ArrayHelper::map(Pembimbing::find()
    ->all(),
    'id','nama_pembimbing'),
    ['prompt' => '-- Pilih Pembimbing --']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary grid-button']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div></div></div>
