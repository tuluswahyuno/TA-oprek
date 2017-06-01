<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembimbing".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama_pembimbing
 *
 * @property Divisi[] $divisis
 */
class Pembimbing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembimbing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama_pembimbing'], 'required'],
            [['nip'], 'string', 'max' => 15],
            [['nama_pembimbing'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'NIP',
            'nama_pembimbing' => 'Nama Pembimbing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisis()
    {
        return $this->hasMany(Divisi::className(), ['pembimbing_id' => 'id']);
    }
}
