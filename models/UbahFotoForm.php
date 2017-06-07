<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UbahFotoForm extends Model
{
    public $foto;

    public function rules()
    {
        return [
            [['foto'], 'required', 'message' => ''],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg, gif'],
        ];
    }

    public function foto($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user     = User::findOne($id);
        $file     = $user->foto;
        
        if ($file == 'null.png') {
            $random = Yii::$app->getSecurity()->generateRandomString(10);
            $kode   = date('md');
            $img    = $kode . $random;
        } else {
            $path = pathinfo($file);
            $img  = $path['filename'];
            unlink('uploads/user/' . $file);
        }

        $user->foto = $img . '.' . $this->foto->extension;
        $this->foto->saveAs('uploads/user/' . $img . '.' . $this->foto->extension);

        return $user->save();
    }

    public function attributeLabels()
    {
        return [
            'foto'            => 'Ubah Foto Profile',
        ];
    }
}