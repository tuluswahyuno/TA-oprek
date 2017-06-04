<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\DetailTugas;
use yii\bootstrap\Button;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Tugas */

$this->title = $model->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-view">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM TUGAS UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>

            <div class="box-body">

    <!-- <h1><?= Html::encode($this->title) ?></h1>
 -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'id',*/
            'nama_tugas',
            'tugas',
            'tgl_penugasan',
            'tgl_pengumpulan',
            [
                'label'=> 'Nama Pembimbing',
                'value'=> $nama_pembimbing->nama_pembimbing,
            ]
        ],
    ]) ?>



    <?php
    $user = Yii::$app->user =='admin';
    if ($user){
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
    }else
    {
            $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

            echo $form->field($modelDetailTugas, 'tugas_id')->hiddenInput(['value'=> $model->id])->label(false); 

            echo $form->field($modelDetailTugas, 'user_id')->hiddenInput(['value'=>Yii::$app->user->id])->label(false);

            echo $form->field($modelDetailTugas, 'tgl_pengumpulan')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false);

            echo $form->field($modelDetailTugas, 'file')->widget(FileInput::classname(),[
                'options'=>[
                    'multiple'=>false
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'initialPreviewAsData' => false, 
                    'initialPreview'=>[
                        Html::img("@web/uploads/tugas/" . $modelDetailTugas->file_tugas,['width' => 200])
                    ],
                    'initialCaption' => $modelDetailTugas->file_tugas,
                'overwriteInitial'=> true
                ]
            ]);

        echo "<p></p><center>";
             echo Html::submitButton('Save', ['class' => 'btn btn-success']);
        echo "</center>";
            ActiveForm::end();
        
    }
    ?>

</div></div></div>
