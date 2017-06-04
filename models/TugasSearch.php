<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tugas;

/**
 * TugasSearch represents the model behind the search form of `app\models\Tugas`.
 */
class TugasSearch extends Tugas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pembimbing_id'], 'integer'],
            [['nama_tugas', 'tugas', 'tgl_penugasan', 'tgl_pengumpulan'], 'safe'],
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
        $query = Tugas::find();

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
            'tgl_penugasan' => $this->tgl_penugasan,
            'tgl_pengumpulan' => $this->tgl_pengumpulan,
            'pembimbing_id' => $this->pembimbing_id,
        ]);

        $query->andFilterWhere(['like', 'nama_tugas', $this->nama_tugas])
            ->andFilterWhere(['like', 'tugas', $this->tugas]);

        return $dataProvider;
    }
}
