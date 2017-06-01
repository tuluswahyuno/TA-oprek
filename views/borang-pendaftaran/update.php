<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */

$this->title = 'Update Borang Pendaftaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="borang-pendaftaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelRiwayatPendidikanSD' => $modelRiwayatPendidikanSD,
        'modelRiwayatPendidikanSMP' => $modelRiwayatPendidikanSMP,
        'modelRiwayatPendidikanSMA' => $modelRiwayatPendidikanSMA,
        'modelDataOrangTua' => $modelDataOrangTua,
    ]) ?>

</div>
