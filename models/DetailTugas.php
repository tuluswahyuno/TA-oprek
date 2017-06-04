<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_tugas".
 *
 * @property int $id
 * @property int $tugas_id
 * @property int $user_id
 * @property string $tgl_pengumpulan
 * @property string $file_tugas
 */
class DetailTugas extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tugas_id', 'user_id', 'tgl_pengumpulan', 'file_tugas'], 'required'],
            [['tugas_id', 'user_id'], 'integer'],
            [['tgl_pengumpulan'], 'safe'],
            [['file_tugas'], 'string', 'max' => 200],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tugas_id' => 'Tugas ID',
            'user_id' => 'User ID',
            'tgl_pengumpulan' => 'Tgl Pengumpulan',
            'file_tugas' => 'File Tugas',
            'file' => 'File',
        ];
    }


   public function upload()
    {       
        if (isset($this->file))
            {
                //tugas
                $this->file_tugas = '('.date('d-m-Y H:i:s') . ')' . $this->file->basename . '.' . $this->file->extension;
                $this->file->saveAs('uploads/tugas/' . $this->file_tugas);
            }
            $this->save(false);
            return true;
        
    }
}
