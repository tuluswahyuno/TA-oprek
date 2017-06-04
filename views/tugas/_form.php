<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Pembimbing;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Tugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-form">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM TUGAS UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>

            <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_tugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tugas')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'tgl_penugasan')->widget(DatePicker::className(),
                            [
                                'options' => ['placeholder' => 'pilih tanggal penugasan'],
                                'pluginOptions' => [
                                    'autoClose' => true,
                                    'format' => 'yyyy/mm/dd',
                                ],
                            ]) ?>

    <?= $form->field($model, 'tgl_pengumpulan')->widget(DatePicker::className(),
                            [
                                'options' => ['placeholder' => 'pilih tanggal pengumpulan'],
                                'pluginOptions' => [
                                    'autoClose' => true,
                                    'format' => 'yyyy/mm/dd',
                                ],
                            ]) ?>

    

    <?= $form->field($model, 'pembimbing_id')
        ->label('Nama Pembimbing')
        ->dropDownList(ArrayHelper::map(Pembimbing::find()
        ->all(),
        'id','nama_pembimbing'),
    ['prompt' => '-- Pilih Nama Pembimbing --']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div></div></div>
