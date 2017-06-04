<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */

$this->title = $model->divisi;
$this->params['breadcrumbs'][] = ['label' => 'Divisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divisi-view">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM DIVISI UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>
            <div class="box-body">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <div class="row"> <div class="col-sm-10 col-sm-offset-1"> -->
    <?php 
    if (user=guest){
        
    }
    ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'divisi',
            [
                'label'=> 'Nama Pembimbing',
                'value'=> $nama_pembimbing->nama_pembimbing,
            ]
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
    <!-- </div><div class="clearfix"></div></div> -->
</div></div></div>
