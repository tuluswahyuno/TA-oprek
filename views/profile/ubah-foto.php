<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

$this->title = 'GANTI FOTO';

?>

<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="content" >
                <h1>Ganti Foto Saya</h1>
                <hr>
                <?php $form = ActiveForm::begin([
                'enableClientValidation' => false,
                'enableAjaxValidation' => false,
                'validateOnChange' => false,
                'validateOnBlur' => false,
                'options' => [
                    'enctype' => 'multipart/form-data',
                ],
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-3 control-label',
                        'offset' => 'col-sm-offset-2',
                        'wrapper' => 'col-sm-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]); ?>

            
            <?= $form->field($ubah, 'foto')->widget(FileInput::classname(), [
                'language' => 'id',
                'pluginOptions' => [
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'browseLabel' => 'Pilih Foto',
                    'browseClass' => 'btn btn-primary btn-flat',
                    'browseIcon' => '<i class="fa fa-image"></i> ',
                    'removeClass' => 'btn btn-default btn-flat',
                ]
            ]) ?>

            <div style="padding: 24px 0"></div>
            <?= Html::submitButton('Ubah Foto', ['class' => 'btn btn-primary btn-flat btn-block']) ?>
            
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-danger text-center">
            <div class="box-body box-profil">
                    <div class="foto-profil">
                        <?= Html::a('
                            <img src="' . Yii::$app->request->baseUrl . '/uploads/user/' . $model->foto . '"
                                class="img-circle foto-aktif"
                                alt="' . strtoupper($model->username) . '">
                            <div class="tombol-ganti">
                                <span><i class="fa fa-camera"></i></span><br>
                                UBAH FOTO
                            </div>',
                            ['/profile/ubah-foto']
                        ) ?>
                    </div>
                <h3 style="margin: 15px 0 0"><?= strtoupper($model->username) ?></h3>        
                <span style="margin: 10px 0"><?= strtoupper($model->email) ?></span>
            </div>

            <p>
                <small>Terdaftar sejak <?= date('d M Y', $model->created_at) ?></small>
            </p>
            <hr>
            <div class="btn-profil">
                <?= Html::a('<i class="fa fa-id-card"></i> Cetak Kartu Peserta',
                    ['cetak-kartu', 'a' => $model->id, 'b' => $model->auth_key],
                    ['class' => 'btn btn-default btn-flat btn-sm btn-block']
                ) ?>
                <?= Html::a('<i class="fa fa-pencil"></i> Perbarui Data',
                    ['update', 'a' => $model->id, 'b' => $model->auth_key],
                    ['class' => 'btn btn-primary btn-flat btn-sm btn-block']
                ) ?>
                
            </div>
        </div>
    </div>
    
</div>