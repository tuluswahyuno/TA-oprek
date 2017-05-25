<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */

$this->title = 'Create Borang Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borang-pendaftaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelRiwayatPendidikan' => $modelRiwayatPendidikan,
        'modelDataOrangTua' => $modelDataOrangTua,
    ]) ?>

</div>
