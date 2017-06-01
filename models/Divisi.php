<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divisi".
 *
 * @property int $id
 * @property string $divisi
 * @property string $pembimbing
 *
 * @property BorangPendaftaran[] $borangPendaftarans
 */
class Divisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'divisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['divisi', 'pembimbing_id'], 'required'],
            [['divisi'], 'string', 'max' => 30],
            [['pembimbing_id'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'divisi' => 'Divisi',
            'pembimbing_id' => 'Nama Pembimbing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangPendaftarans()
    {
        return $this->hasMany(BorangPendaftaran::className(), ['divisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbing()
    {
        return $this->hasOne(Pembimbing::className(), ['id' => 'pembimbing_id']);
    }

    
}
