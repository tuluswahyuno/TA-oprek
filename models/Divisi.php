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
            [['divisi', 'pembimbing'], 'required'],
            [['divisi'], 'string', 'max' => 30],
            [['pembimbing'], 'string', 'max' => 60],
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
            'pembimbing' => 'Pembimbing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangPendaftarans()
    {
        return $this->hasMany(BorangPendaftaran::className(), ['divisi_id' => 'id']);
    }
}
