<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\UploadedFile;
use app\models\UbahFotoForm;

/**
 * Site controller
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }

    public function actionUbahFoto() {
        $model = $this->findModel();
        $ubah  = new UbahFotoForm();

        if ($ubah->load(Yii::$app->request->post())) {
            $ubah->foto = UploadedFile::getInstance($ubah, 'foto');
            if ($user = $ubah->foto($model->id)) {
                return $this->redirect('index');
            }
        } 
        return $this->render('ubah-foto', [
            'model' => $model,
            'ubah'  => $ubah
        ]);
    }

    protected function findModel() {
        if (($model = User::findOne(Yii::$app->user->identity->id)) !== null) {
            return $model;
        }
    }

    
}
