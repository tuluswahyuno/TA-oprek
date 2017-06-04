<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailTugas */

$this->title = 'Create Detail Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Detail Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-tugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
