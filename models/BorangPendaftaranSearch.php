<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BorangPendaftaran;

/**
 * BorangPendaftaranSearch represents the model behind the search form of `app\models\BorangPendaftaran`.
 */
class BorangPendaftaranSearch extends BorangPendaftaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'semester', 'no_hp', 'status_validasi', 'divisi_id'], 'integer'],
            [['nama', 'prodi', 'fakultas', 'pembimbing_akademik', 'nip', 'tahun_akademik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'status_marital', 'alamat_asal', 'alamat_kost', 'hobi', 'url_blog', 'pengalaman_it', 'kemampuan_khusus'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BorangPendaftaran::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'semester' => $this->semester,
            'tanggal_lahir' => $this->tanggal_lahir,
            'no_hp' => $this->no_hp,
            'status_validasi' => $this->status_validasi,
            'divisi_id' => $this->divisi_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'prodi', $this->prodi])
            ->andFilterWhere(['like', 'fakultas', $this->fakultas])
            ->andFilterWhere(['like', 'pembimbing_akademik', $this->pembimbing_akademik])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'tahun_akademik', $this->tahun_akademik])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'status_marital', $this->status_marital])
            ->andFilterWhere(['like', 'alamat_asal', $this->alamat_asal])
            ->andFilterWhere(['like', 'alamat_kost', $this->alamat_kost])
            ->andFilterWhere(['like', 'hobi', $this->hobi])
            ->andFilterWhere(['like', 'url_blog', $this->url_blog])
            ->andFilterWhere(['like', 'pengalaman_it', $this->pengalaman_it])
            ->andFilterWhere(['like', 'kemampuan_khusus', $this->kemampuan_khusus]);

        return $dataProvider;
    }
}
