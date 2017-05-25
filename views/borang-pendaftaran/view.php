<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borang-pendaftaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
            'status_validasi',
            'divisi_id',
        ],
    ]) ?>

</div>
