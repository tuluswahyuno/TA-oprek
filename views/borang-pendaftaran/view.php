<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borang-pendaftaran-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div>
    <div class="box box-primary">
        <div class="box box-body">

            <!-- tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Data Diri</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riawayat Pendidikan</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Data Orang Tua</a></li>
                <li role="presentation"><a href="#messages2" aria-controls="messages2" role="tab" data-toggle="tab">Berkas</a></li>
            </ul>

            <!-- content -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                           /* 'id',*/
                            'id_user',
                            'nama',
                            'prodi',
                            'fakultas',
                            'pembimbing_akademik',
                            'nip',
                            'semester',
                            'tahun_akademik',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'jenis_kelamin',
                            'agama',
                            'status_marital',
                            'alamat_asal:ntext',
                            'alamat_kost:ntext',
                            'no_hp',
                            'hobi:ntext',
                            'url_blog:ntext',
                            'pengalaman_it:ntext',
                            'kemampuan_khusus:ntext',
                            [
                                'label' => 'Status',
                                'attribute' => 'status_validasi',
                                'value' => function($model){
                                    return $model->getStatusValidasi($model->status_validasi);
                                },
                            ],
                            [
                            'label'=> 'Divisi',
                            'value'=> $divisi->divisi,
                            ],]
                    ]) ?>
                    <center>
                    <h1>
                        <?= Html::a('Ubah Status', ['ubah-status', 'id' => $model->id], ['class' => $model->status_validasi == 0 ? 'btn btn-warning' : 'btn btn-success']);?>
                    </h1>
                    </center>

                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <p></p>

                            <div col col-md-12>
                            <div class="panel-group col-md-12" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                      Sekolah Dasar
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    
                                    <?= DetailView::widget([
                                                'model' => $modelRiwayatPendidikanSD,
                                                'attributes' => [
                                                    'jenjang',
                                                    'nama_sekolah',
                                                    'tahun_lulus',
                                                ],
                                            ]) ?>

                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Sekolah Menengah Pertama
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body">

                                    <?= DetailView::widget([
                                                'model' => $modelRiwayatPendidikanSMP,
                                                'attributes' => [
                                                    'jenjang',
                                                    'nama_sekolah',
                                                    'tahun_lulus',
                                                ],
                                            ]) ?>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Sekolah Menengah Atas
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="panel-body">
                                    
                                    <?= DetailView::widget([
                                                'model' => $modelRiwayatPendidikanSMA,
                                                'attributes' => [
                                                    'jenjang',
                                                    'nama_sekolah',
                                                    'tahun_lulus',
                                                ],
                                            ]) ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
    

                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <?= DetailView::widget([
                            'model' => $modelDataOrangTua,
                            'attributes' => [
                                'nama_ayah',
                                'pekerjaan_ayah',
                                'alamat_ayah',
                                'nama_ibu',
                                'pekerjaan_ibu',
                                'alamat_ibu',
                                ],
                            ]) ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="messages2">

                    <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                'attributes' => 'foto',
                                'label' => 'Foto',
                                'value' => function($model){
                                    return Html::img('@web/uploads/foto/' . $model->foto,['alt' => 'foto', 'width' => 200]);
                                },
                                'format' => 'raw',
                                ],
                                [
                                'attributes' => 'khs',
                                'label' => 'KHS',
                                'value' => function($model){
                                    return Html::img('@web/uploads/khs/' . $model->khs,['alt' => 'khs', 'width' => 200]);
                                },
                                'format' => 'raw',
                                ],
                                [
                                'attributes' => 'surat_rekomendasi',
                                'label' => 'Surat Rekomendasi',
                                'value' => function($model){
                                    return Html::img('@web/uploads/surat-rekomendasi/' . $model->surat_rekomendasi,['alt' => 'surat_rekomendasi', 'width' => 200]);
                                },
                                'format' => 'raw',
                                ],
                                [
                                'attributes' => 'sertifikat',
                                'label' => 'Sertifikat',
                                'value' => function($model){
                                    return Html::img('@web/uploads/sertifikat/' . $model->sertifikat,['alt' => 'sertifikat', 'width' => 200]);
                                },
                                'format' => 'raw',
                                ],

                                ],
                            ]) ?>
        </div>
    </div>
</div>
</div>
