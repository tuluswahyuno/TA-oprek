<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */

$this->title = $model->nama_pembimbing;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-view">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM PEMBIMBING MAGANG UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>
            <div class="box-body">

   <!--  <h1><?= Html::encode($this->title) ?></h1> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'nip',
            'nama_pembimbing',
        ],
    ]) ?>

    <p></p>
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
</div></div></div>
