<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Komponenti;

/**
 * KomponentiSearch represents the model behind the search form of `app\modules\admin\models\Komponenti`.
 */
class KomponentiSearch extends Komponenti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'nomer_komponenta', 'stoimost', 'kolvo'], 'integer'],
            [['naimenovanie_kom', 'forma', 'data_polycheniya', 'data_isp'], 'safe'],
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
        $query = Komponenti::find();

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
            'nomer_komponenta' => $this->nomer_komponenta,
            'stoimost' => $this->stoimost,
            'kolvo' => $this->kolvo,
            'data_polycheniya' => $this->data_polycheniya,
            'data_isp' => $this->data_isp,
        ]);

        $query->andFilterWhere(['like', 'naimenovanie_kom', $this->naimenovanie_kom])
            ->andFilterWhere(['like', 'forma', $this->forma]);

        return $dataProvider;
    }
}
