<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_orang_tua".
 *
 * @property int $id
 * @property int $id_pendaftaran
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $pekerjaan_ayah
 * @property string $pekerjaan_ibu
 * @property string $pendidikan_ayah
 * @property string $pendidikan_ibu
 * @property string $alamat_ayah
 * @property string $alamat_ibu
 *
 * @property BorangPendaftaran $pendaftaran
 */
class DataOrangTua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_orang_tua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_ayah', 'pendidikan_ibu', 'alamat_ayah', 'alamat_ibu'], 'required'],
            [['id_pendaftaran'], 'integer'],
            [['alamat_ayah', 'alamat_ibu'], 'string'],
            [['nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_ayah', 'pendidikan_ibu'], 'string', 'max' => 50],
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
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'pendidikan_ayah' => 'Pendidikan Ayah',
            'pendidikan_ibu' => 'Pendidikan Ibu',
            'alamat_ayah' => 'Alamat Ayah',
            'alamat_ibu' => 'Alamat Ibu',
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
