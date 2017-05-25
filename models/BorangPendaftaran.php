<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "borang_pendaftaran".
 *
 * @property int $id
 * @property int $id_user
 * @property string $nama
 * @property string $prodi
 * @property string $fakultas
 * @property string $pembimbing_akademik
 * @property string $nip
 * @property int $semester
 * @property string $tahun_akademik
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $status_marital
 * @property string $alamat_asal
 * @property string $alamat_kost
 * @property int $no_hp
 * @property string $hobi
 * @property string $url_blog
 * @property string $pengalaman_it
 * @property string $kemampuan_khusus
 * @property int $status_validasi
 * @property int $divisi_id
 *
 * @property User $user
 * @property Divisi $divisi
 * @property DataOrangTua[] $dataOrangTuas
 * @property RiwayatPendidikan[] $riwayatPendidikans
 */
class BorangPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'borang_pendaftaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'nama', 'prodi', 'fakultas', 'pembimbing_akademik', 'nip', 'semester', 'tahun_akademik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'status_marital', 'alamat_asal', 'alamat_kost', 'no_hp', 'hobi', 'url_blog', 'pengalaman_it', 'kemampuan_khusus', 'status_validasi', 'divisi_id'], 'required'],
            [['id_user', 'semester', 'no_hp', 'status_validasi', 'divisi_id'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat_asal', 'alamat_kost', 'hobi', 'url_blog', 'pengalaman_it', 'kemampuan_khusus'], 'string'],
            [['nama', 'prodi', 'fakultas', 'pembimbing_akademik'], 'string', 'max' => 50],
            [['nip'], 'string', 'max' => 25],
            [['tahun_akademik', 'jenis_kelamin', 'agama'], 'string', 'max' => 10],
            [['tempat_lahir'], 'string', 'max' => 255],
            [['status_marital'], 'string', 'max' => 30],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['divisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['divisi_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'prodi' => 'Prodi',
            'fakultas' => 'Fakultas',
            'pembimbing_akademik' => 'Pembimbing Akademik',
            'nip' => 'Nip',
            'semester' => 'Semester',
            'tahun_akademik' => 'Tahun Akademik',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'status_marital' => 'Status Marital',
            'alamat_asal' => 'Alamat Asal',
            'alamat_kost' => 'Alamat Kost',
            'no_hp' => 'No Hp',
            'hobi' => 'Hobi',
            'url_blog' => 'Url Blog',
            'pengalaman_it' => 'Pengalaman It',
            'kemampuan_khusus' => 'Kemampuan Khusus',
            'status_validasi' => 'Status Validasi',
            'divisi_id' => 'Divisi ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id' => 'divisi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataOrangTuas()
    {
        return $this->hasMany(DataOrangTua::className(), ['id_pendaftaran' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPendidikans()
    {
        return $this->hasMany(RiwayatPendidikan::className(), ['id_pendaftaran' => 'id']);
    }
}
