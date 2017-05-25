<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riwayat_pendidikan".
 *
 * @property int $id
 * @property int $id_pendaftaran
 * @property string $jenjang
 * @property string $nama_sekolah
 * @property string $tahun_lulus
 *
 * @property BorangPendaftaran $pendaftaran
 */
class RiwayatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'jenjang', 'nama_sekolah', 'tahun_lulus'], 'required'],
            [['id_pendaftaran'], 'integer'],
            [['jenjang'], 'string'],
            [['tahun_lulus'], 'safe'],
            [['nama_sekolah'], 'string', 'max' => 50],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => BorangPendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pendaftaran' => 'Id Pendaftaran',
            'jenjang' => 'Jenjang',
            'nama_sekolah' => 'Nama Sekolah',
            'tahun_lulus' => 'Tahun Lulus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(BorangPendaftaran::className(), ['id' => 'id_pendaftaran']);
    }
}
