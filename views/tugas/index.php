<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Tugas', ['create'], ['class' => 'btn btn-primary grid-button']) ?>
    </p>

    <?php

    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
           /* 'id',*/
            'nama_tugas',
            'tugas',
            'tgl_penugasan',
            'tgl_pengumpulan',
    ];
    
    
    //export configuration
    $fullExportMenu = ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'target' => ExportMenu::TARGET_BLANK,
        'fontAwesome' => true,
        'asDropdown' => false, // this is important for this case so we just need to get a HTML list
        'dropdownOptions' => [
            'label' => '<i class="glyphicon glyphicon-export"></i> Full'
        ],
    ]);

    ?>

    <?= GridView::widget([
        //other configuration
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<h3 class="panel-title"></i></h3>',
                ],
                // the toolbar setting is default
                'toolbar' => [
                    '{export}',
                    '{toggleData}',
                ],
                // configure your GRID inbuilt export dropdown to include additional items
                'export' => [
                    'fontAwesome' => true,
                    'itemsAfter'=> [
                        '<li role="presentation" class="divider"></li>',
                        '<li class="dropdown-header">Export All Data</li>',
                        $fullExportMenu
                    ]
                ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'nama_tugas',
            'tugas',
            'tgl_penugasan',
            'tgl_pengumpulan',
            [
                'attribute'=>'pembimbing_id',
                'value'=>'pembimbing.nama_pembimbing'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
