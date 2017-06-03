<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use app\models\BorangPendaftaran;
use app\models\BorangPendaftaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DataOrangTua;
use app\models\RiwayatPendidikan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Divisi;
use yii\web\UploadedFile;


/**
 * BorangPendaftaranController implements the CRUD actions for BorangPendaftaran model.
 */
class BorangPendaftaranController extends Controller
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
     * Lists all BorangPendaftaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BorangPendaftaranSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = BorangPendaftaran::find()->where(['status' => 1]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query
            ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BorangPendaftaran model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $divisi = Divisi::find()->where(['id'=>$model->divisi_id])->one();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelRiwayatPendidikanSD' => RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' => 'Sekolah Dasar']),
            'modelRiwayatPendidikanSMP' => RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' => 'Sekolah Menengah Pertama']),
            'modelRiwayatPendidikanSMA' => RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' => 'Sekolah Menengah Atas']),
            'modelDataOrangTua' => DataOrangTua::findOne(['id_pendaftaran' => $id]),
            'divisi' => $divisi,
        ]);
    }


    /**
     * Creates a new BorangPendaftaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BorangPendaftaran();

        //Mendeklarasikan semua model yang berhubungan dengan Model Borang Pendaftaran
        $modelRiwayatPendidikanSD = new RiwayatPendidikan();
        $modelRiwayatPendidikanSMP = new RiwayatPendidikan();
        $modelRiwayatPendidikanSMA = new RiwayatPendidikan();
        $modelDataOrangTua = new DataOrangTua();

        $connection = \Yii::$app->db;   
        $transaction = $connection->beginTransaction();
        //terima model POST
        if ($model->load(Yii::$app->request->post()) && 
            $modelDataOrangTua->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSD->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSMP->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSMA->load(Yii::$app->request->post())) {

            $modelRiwayatPendidikanSD->attributes = $_POST['RiwayatPendidikan']['SD'];
            $modelRiwayatPendidikanSMP->attributes = $_POST['RiwayatPendidikan']['SMP'];
            $modelRiwayatPendidikanSMA->attributes = $_POST['RiwayatPendidikan']['SMA'];

            //terima upload
            $model->file_foto = UploadedFile::getInstance($model, 'file_foto');
            $model->file_khs = UploadedFile::getInstance($model, 'file_khs');
            $model->file_surat_rekomendasi = UploadedFile::getInstance($model, 'file_surat_rekomendasi');
            $model->file_sertifikat = UploadedFile::getInstance($model, 'file_sertifikat');

            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // exit();
            
            //mulai proses validasi
            //proses validasi model borang pendaftaran
            if($model->save()){
                //model borang pendaftaran tersimpan dengan benar
                //id pendaftaran mengambil dari model->id
                $modelDataOrangTua->id_pendaftaran = $model->id;
                //proses validasi model data orang tua
                if ($modelDataOrangTua->save()) {
                    //$modelDataOrangTua terisi dan tersimpan dengan benar
                    //id pendaftaran mengambil dari model->id
                    $modelRiwayatPendidikanSD->id_pendaftaran = $model->id;
                    $modelRiwayatPendidikanSMP->id_pendaftaran = $model->id;
                    $modelRiwayatPendidikanSMA->id_pendaftaran = $model->id;
                    //proses validasi model data pendidikan 
                    if($modelRiwayatPendidikanSD->save() && 
                        $modelRiwayatPendidikanSMP->save() &&
                        $modelRiwayatPendidikanSMA->save()){
                        //$model riwayat pendidikan tersimpan dengan benar
                        //validasi file upload
                        
                        if($model->upload()){
                            //uploaded successfull
                            $transaction->commit();
                            return $this->redirect(['index']);
                        }else{
                            $transaction->rollback();
                            throw new NotFoundHttpException("File anda ada yang salah");
                        }
                    }else{
                        //$modelRiwayatPendidikan batal tersimpan
                        $transaction->rollback();
                        throw new NotFoundHttpException("Data Riwayat Pendidikan tidak terisi dengan benar");    
                    }
                }else{
                    //$modelDataOrangTua batal tersimpan
                    $transaction->rollback();
                    throw new NotFoundHttpException("Data orang tua tidak terisi dengan benar");
                }
            }else{
                //model tidak lengkap
                //langsung rollback batalkan transaksi database
                throw new NotFoundHttpException("Data pendaftaran tidak terisi dengan benar");
                $transaction->rollback();
            }
            // return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //Memberikan Return dari model yang telah dideklarasikan 
                'modelRiwayatPendidikanSD' => $modelRiwayatPendidikanSD,
                'modelRiwayatPendidikanSMP' => $modelRiwayatPendidikanSMP,
                'modelRiwayatPendidikanSMA' => $modelRiwayatPendidikanSMA,
                'modelDataOrangTua' => $modelDataOrangTua,
            ]);
        }
    }

    /**
     * Updates an existing BorangPendaftaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        

        //Mendeklarasikan semua model yang berhubungan dengan Model Borang Pendaftaran
        $modelRiwayatPendidikanSD = RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' =>'Sekolah Dasar']);
        $modelRiwayatPendidikanSMP = RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' =>'Sekolah Menengah Pertama']);
        $modelRiwayatPendidikanSMA = RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' =>'Sekolah Menengah Atas']);
        $model = BorangPendaftaran::findOne(['id' => $id]);
        $modelDataOrangTua = DataOrangTua::findOne(['id_pendaftaran' => $id]);

        $connection = \Yii::$app->db;   
        $transaction = $connection->beginTransaction();
        //terima model POST
        if ($model->load(Yii::$app->request->post()) && 
            $modelDataOrangTua->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSD->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSMP->load(Yii::$app->request->post()) &&
            $modelRiwayatPendidikanSMA->load(Yii::$app->request->post())) {


            $modelRiwayatPendidikanSD->attributes = $_POST['RiwayatPendidikan']['SD'];
            $modelRiwayatPendidikanSMP->attributes = $_POST['RiwayatPendidikan']['SMP'];
            $modelRiwayatPendidikanSMA->attributes = $_POST['RiwayatPendidikan']['SMA'];
            /*echo "<pre>";
            print_r($model);
            echo "</pre>";
            exit();*/
            //mulai proses validasi
            //proses validasi model borang pendaftaran
            if($model->save()){
                //model borang pendaftaran tersimpan dengan benar
                //id pendaftaran mengambil dari model->id
                $modelDataOrangTua->id_pendaftaran = $model->id;
                //proses validasi model data orang tua
                if ($modelDataOrangTua->save()) {
                    //$modelDataOrangTua terisi dan tersimpan dengan benar
                    //id pendaftaran mengambil dari model->id
                    $modelRiwayatPendidikanSD->id_pendaftaran = $model->id;
                    $modelRiwayatPendidikanSMP->id_pendaftaran = $model->id;
                    $modelRiwayatPendidikanSMA->id_pendaftaran = $model->id;
                    //proses validasi model data pendidikan 
                    if($modelRiwayatPendidikanSD->save() && 
                        $modelRiwayatPendidikanSMP->save() &&
                        $modelRiwayatPendidikanSMA->save()){
                        //$model riwayat pendidikan tersimpan dengan benar
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }else{
                        //$modelRiwayatPendidikan batal tersimpan
                        $transaction->rollback();
                        throw new NotFoundHttpException("Data Riwayat Pendidikan tidak terisi dengan benar");    
                    }
                }else{
                    //$modelDataOrangTua batal tersimpan
                    $transaction->rollback();
                    throw new NotFoundHttpException("Data orang tua tidak terisi dengan benar");
                }
            }else{
                //model tidak lengkap
                //langsung rollback batalkan transaksi database
                throw new NotFoundHttpException("Data pendaftaran tidak terisi dengan benar");
                $transaction->rollback();
            }
            // return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // echo "<pre>";
            // print_r($modelDataOrangTua);
            // echo "</pre>";
            // exit();
            return $this->render('update', [
                'model' => $model,
                //Memberikan Return dari model yang telah dideklarasikan 
                'modelRiwayatPendidikanSD' => $modelRiwayatPendidikanSD,
                'modelRiwayatPendidikanSMP' => $modelRiwayatPendidikanSMP,
                'modelRiwayatPendidikanSMA' => $modelRiwayatPendidikanSMA,
                'modelDataOrangTua' => $modelDataOrangTua,
            ]);
        }
    }



    /**
     * Deletes an existing BorangPendaftaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BorangPendaftaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BorangPendaftaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BorangPendaftaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest($id)
    {
        $data = RiwayatPendidikan::findOne(['id_pendaftaran' => $id, 'jenjang' =>'Sekolah Menengah Atas']);
        var_dump($data);
        exit();
    }

    public function actionUbahStatus($id)
    {
        $model = $this->findModel($id);
        if ($model->status_validasi == 1) {
            $model->status_validasi = 0;
        }else{
            $model->status_validasi = 1;
        }
        
        $model->update();

        return $this->redirect(Yii::$app->request->referrer);
    }

   public function actionDownload($id)
   {
        $model = $this->findModel($id);
        $dir = 'uploads/'.$model->photo;

        if(file_exists($dir)){
            Yii::$app->response->sendFile($dir);
        }else{
            die('file not found');
        }
        
   }

}
