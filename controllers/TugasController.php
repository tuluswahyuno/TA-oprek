<?php

namespace app\controllers;

use Yii;
use app\models\Tugas;
use app\models\TugasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Pembimbing;
use app\models\DetailTugas;
use yii\web\UploadedFile;

/**
 * TugasController implements the CRUD actions for Tugas model.
 */
class TugasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tugas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TugasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tugas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $nama_pembimbing = Pembimbing::find()->where(['id'=>$model->pembimbing_id])->one();
        
        $modelDetailTugas = new DetailTugas();

        if ($modelDetailTugas->load(Yii::$app->request->post())) {
            $modelDetailTugas->file = UploadedFile::getInstance($modelDetailTugas, 'file');
            $modelDetailTugas->upload();
            // echo "<pre>";
            // print_r($modelDetailTugas->file);
            // echo "<pre>";
            // exit();
            if($modelDetailTugas->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                var_dump($modelDetailTugas->errors);
                exit();
            }
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'nama_pembimbing' => $nama_pembimbing,
                'modelDetailTugas' => $modelDetailTugas,
            ]);
        }


    }

    /**
     * Creates a new Tugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tugas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tugas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tugas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
