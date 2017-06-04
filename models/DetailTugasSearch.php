<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailTugas;

/**
 * DetailTugasSearch represents the model behind the search form of `app\models\DetailTugas`.
 */
class DetailTugasSearch extends DetailTugas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tugas_id', 'user_id'], 'integer'],
            [['tgl_pengumpulan', 'file_tugas'], 'safe'],
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
        $query = DetailTugas::find();

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
            'tugas_id' => $this->tugas_id,
            'user_id' => $this->user_id,
            'tgl_pengumpulan' => $this->tgl_pengumpulan,
        ]);

        $query->andFilterWhere(['like', 'file_tugas', $this->file_tugas]);

        return $dataProvider;
    }
}
