<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Statistika;

/**
 * StatistikaSearch represents the model behind the search form of `app\modules\admin\models\Statistika`.
 */
class StatistikaSearch extends Statistika
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva'], 'integer'],
            [['data', 'statusL', 'sposob_prigotovl'], 'safe'],
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
        $query = Statistika::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->JoinWith(['nomerLekarstva', 'nomerLekarstva.izgotavlivaemieLekarstva']),
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
            'nomer_lekarstva' => $this->nomer_lekarstva,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'statusL', $this->statusL])
            ->andFilterWhere(['like', 'sposob_prigotovl', $this->sposob_prigotovl]);

        return $dataProvider;
    }
}
