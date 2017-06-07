<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = strtoupper($model->username);

?>

<div class="row">
    <div class="col-md-3">
        <div class="box text-center">
            <div class="box-body box-profil">
                    <div class="foto-profil">
                        <div class="foto-utama">
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
    <div class="col-md-9">
        <div class="box">
            <div class="content" >
                <h1><?= $model->username ?></h1>
                <hr>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'username',
                        'email',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>