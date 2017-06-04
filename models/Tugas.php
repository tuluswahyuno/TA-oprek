<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tugas".
 *
 * @property int $id
 * @property string $nama_tugas
 * @property string $tugas
 * @property string $tgl_penugasan
 * @property string $tgl_pengumpulan
 * @property int $pembimbing_id
 *
 * @property Pembimbing $pembimbing
 */
class Tugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tugas', 'tugas', 'tgl_penugasan', 'tgl_pengumpulan', 'pembimbing_id'], 'required'],
            [['tgl_penugasan', 'tgl_pengumpulan'], 'safe'],
            [['pembimbing_id'], 'integer'],
            [['nama_tugas'], 'string', 'max' => 100],
            [['tugas'], 'string', 'max' => 300],
            [['pembimbing_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pembimbing::className(), 'targetAttribute' => ['pembimbing_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tugas' => 'Nama Tugas',
            'tugas' => 'Tugas',
            'tgl_penugasan' => 'Tgl Penugasan',
            'tgl_pengumpulan' => 'Tgl Pengumpulan',
            'pembimbing_id' => 'Nama Pembimbing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbing()
    {
        return $this->hasOne(Pembimbing::className(), ['id' => 'pembimbing_id']);
    }
}
