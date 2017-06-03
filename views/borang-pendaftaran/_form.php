<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use app\models\Divisi;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\BorangPendaftaran */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="borang-pendaftaran-form">

    <div class="box box-solid box-primary">
            <div class="box-header text-center">
                <i class="fa fa-id-card"></i> FORM PENDAFTARAN MAGANG UPT TEKNOLOGI INFORMASI DAN KOMUNIKASI UNS
            </div>

            <div class="box-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- Bagian Model Borang Pendaftaran -->
    <?php
    $modelForm = "
        <div class='col col-md-6'> " .


            $form->field($model, 'nama')->textInput(['maxlength' => true]).
            
            $form->field($model, 'fakultas')->textInput(['maxlength' => true]).
                    
            $form->field($model, 'prodi')->textInput(['maxlength' => true]).
            
            $form->field($model, 'pembimbing_akademik')->textInput(['maxlength' => true]).
            
            $form->field($model, 'nip')->textInput().

            $form->field($model, 'semester')->textInput() .

            $form->field($model, 'tahun_akademik')->textInput(['maxlength' => true]) .

            $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) .

            $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(),
                            [
                                'options' => ['placeholder' => 'pilih tanggal lahir'],
                                'pluginOptions' => [
                                    'autoClose' => true,
                                    'format' => 'yyyy/mm/dd',
                                ],
                            ]) .

            $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) .

            $form->field($model, 'agama')->textInput(['maxlength' => true]) .

            $form->field($model, 'status_marital')->textInput() .

            $form->field($model, 'no_hp')->textInput() .
            

        "</div>
        <div class='col col-md-6'> " . 

            $form->field($model, 'hobi')->textInput(['maxlength' => true]).

            $form->field($model, 'url_blog')->textInput(['maxlength' => true]).

            $form->field($model, 'alamat_asal')->textarea(['rows' => 2]) .

            $form->field($model, 'alamat_kost')->textarea(['rows' => 2]) .

            $form->field($model, 'pengalaman_it')->textarea(['rows' => 2]).

            $form->field($model, 'kemampuan_khusus')->textarea(['rows' => 2]).

           /* $form->field($model, 'divisi_id')->textInput(['maxlength' => true]).*/

            $form->field($model, 'divisi_id')
            ->label('Divisi')
            ->dropDownList(ArrayHelper::map(Divisi::find()
            ->all(),
            'id','divisi'),
            ['prompt' => '-- Pilih Divisi --']
            ).

            $form->field($model, 'file_foto')->widget(FileInput::classname(),[
                'options'=>[
                    'multiple'=>false
                ],
                'pluginOptions' => [
                    'initialPreviewAsData' => false, 
                        'initialPreview'=>[
                        Html::img("@web/uploads/foto/" . $model->foto,['width' => 200])
                ],
                'overwriteInitial'=>true
                ]
            ]) .


            $form->field($model, 'file_surat_rekomendasi')->widget(FileInput::classname(),[
                'options'=>[
                    'multiple'=>false
                ],
                'pluginOptions' => [
                    'initialPreviewAsData' => false, 
                        'initialPreview'=>[
                        Html::img("@web/uploads/surat-rekomendasi/" . $model->surat_rekomendasi,['width' => 200])
                ],
                'overwriteInitial'=>true
                ]
            ]) .

           $form->field($model, 'file_khs')->widget(FileInput::classname(),[
                'options'=>[
                    'multiple'=>false
                ],
                'pluginOptions' => [
                    'initialPreviewAsData' => false, 
                        'initialPreview'=>[
                        Html::img("@web/uploads/khs/" . $model->khs,['width' => 200])
                ],
                'overwriteInitial'=>true
                ]
            ]) .


            $form->field($model, 'file_sertifikat')->widget(FileInput::classname(),[
                'options'=>[
                    'multiple'=>false
                ],
                'pluginOptions' => [
                    'initialPreviewAsData' => false, 
                        'initialPreview'=>[
                        Html::img("@web/uploads/sertifikat/" . $model->sertifikat,['width' => 200])
                ],
                'overwriteInitial'=>true
                ]
            ]) .

        "</div>
    ";
    ?>

    <?php
    $modelForm4 = '<div col col-md-12>
    <div class="panel-group col-md-12" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Data SD
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            '.
           

            $form->field($modelRiwayatPendidikanSD, '[SD]jenjang')->hiddenInput(['value'=>'Sekolah Dasar'])->label(false).

            $form->field($modelRiwayatPendidikanSD, '[SD]nama_sekolah') .

            $form->field($modelRiwayatPendidikanSD, '[SD]tahun_lulus') .'
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Data SMP
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            '.
           

            $form->field($modelRiwayatPendidikanSMP, '[SMP]jenjang')->hiddenInput(['value'=>'Sekolah Menengah Pertama'])->label(false) .

            $form->field($modelRiwayatPendidikanSMP, '[SMP]nama_sekolah') .

            $form->field($modelRiwayatPendidikanSMP, '[SMP]tahun_lulus') .'
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Data SMA
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            '.
          

            $form->field($modelRiwayatPendidikanSMA, '[SMA]jenjang')->hiddenInput(['value'=>'Sekolah Menengah Atas'])->label(false) .

            $form->field($modelRiwayatPendidikanSMA, '[SMA]nama_sekolah') .

            $form->field($modelRiwayatPendidikanSMA, '[SMA]tahun_lulus') .'
          </div>
        </div>
      </div>
    </div>
    </div>'
    ?>
    
   
    <?php
        $modelForm3 = "
            <div class='col col-md-6'> ".
            

            $form->field($modelDataOrangTua, 'nama_ayah') .

            $form->field($modelDataOrangTua, 'pendidikan_ayah') .

            $form->field($modelDataOrangTua, 'pekerjaan_ayah') .

            $form->field($modelDataOrangTua, 'alamat_ayah') .  "

            </div>
            <div class='col col-md-6'> " .

            $form->field($modelDataOrangTua, 'nama_ibu') .
           
            $form->field($modelDataOrangTua, 'pendidikan_ibu') .

            $form->field($modelDataOrangTua, 'pekerjaan_ibu') .
            
            $form->field($modelDataOrangTua, 'alamat_ibu') . "

            </div>"
    ?>

        <?php
    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Step 1',
                'icon' => 'glyphicon glyphicon-pencil',
                'content' => $modelForm,
                'buttons' => [
                    'next' => [
                        'title' => 'Selanjutnya', 
                        'options' => [
                            'class' => 'btn btn-primary'
                        ],
                     ],
                 ],
            ],
            2 => [
                'title' => 'Step 2',
                'icon' => 'glyphicon glyphicon-education',
                'content' => $modelForm4,
                'buttons' => [
                    'next' => [
                        'title' => 'Selanjutnya', 
                        'options' => [
                            'class' => 'btn btn-primary'
                        ],
                     ],
                     'prev' => [
                        'title' => 'Kembali',
                        'options' => [
                            'class' => 'btn btn-danger'
                            ]
                     ],
                 ],
            ],
            3 => [
                'title' => 'Step 3',
                'icon' => 'glyphicon glyphicon-user',
                'content' => $modelForm3,
                'buttons' => [
                    'save' => [
                        'title' => 'Simpan', 
                        'options' => [
                            'class' => 'btn btn-primary grid-button',
                            'type' => 'submit'
                        ],
                     ],
                     'prev' => [
                        'title' => 'Kembali',
                        'options' => [
                            'class' => 'btn btn-danger',
                            ]
                     ],
                 ],
            ],
        ],
        'complete_content' => "You are done!", // Optional final screen
        'start_step' => 1, // Optional, start with a specific step
    ];
    ?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>


    <!-- <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div> -->

    
    <?= $form->field($model, 'id_user')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?= $form->field($model, 'status_validasi')->hiddenInput(['value'=>'1'])->label(false) ?>
    <?= $form->field($model, 'status')->hiddenInput(['value'=>'1'])->label(false) ?>
    

    <?php ActiveForm::end(); ?>

</div></div></div>
