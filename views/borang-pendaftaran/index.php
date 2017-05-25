<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BorangPendaftaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Borang Pendaftarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borang-pendaftaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Borang Pendaftaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'nama',
            'prodi',
            'fakultas',
            // 'pembimbing_akademik',
            // 'nip',
            // 'semester',
            // 'tahun_akademik',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'jenis_kelamin',
            // 'agama',
            // 'status_marital',
            // 'alamat_asal:ntext',
            // 'alamat_kost:ntext',
            // 'no_hp',
            // 'hobi:ntext',
            // 'url_blog:ntext',
            // 'pengalaman_it:ntext',
            // 'kemampuan_khusus:ntext',
            // 'status_validasi',
            // 'divisi_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
