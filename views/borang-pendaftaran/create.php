<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */

$this->title = 'Tambah Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borang-pendaftaran-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'modelRiwayatPendidikanSD' => $modelRiwayatPendidikanSD,
        'modelRiwayatPendidikanSMP' => $modelRiwayatPendidikanSMP,
        'modelRiwayatPendidikanSMA' => $modelRiwayatPendidikanSMA,
        'modelDataOrangTua' => $modelDataOrangTua,
    ]) ?>

</div>
