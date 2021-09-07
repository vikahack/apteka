<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Klienti;

/**
 * KlientiSearch represents the model behind the search form of `app\modules\admin\models\Klienti`.
 */
class KlientiSearch extends Klienti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_klienta'], 'integer'],
            [['familia', 'name', 'otchestvo', 'data_rozdeniya', 'adres', 'telephone', 'kategoriya'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Klienti::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
              'pagination' => [ 'pageSize' => 10, ], 
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'nomer_klienta' => $this->nomer_klienta,
            'data_rozdeniya' => $this->data_rozdeniya,
        ]);

        $query->andFilterWhere(['like', 'familia', $this->familia])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'otchestvo', $this->otchestvo])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'kategoriya', $this->kategoriya]);

        return $dataProvider;
    }
}
