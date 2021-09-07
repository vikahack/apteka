<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Recepti;

/**
 * ReceptiSearch represents the model behind the search form of `app\modules\admin\models\Recepti`.
 */
class ReceptiSearch extends Recepti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_recepta', 'nomer_klienta'], 'integer'],
            [['fio_vracha', 'diagnoz'], 'safe'],
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
        $query = Recepti::find();

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
            'nomer_recepta' => $this->nomer_recepta,
            'nomer_klienta' => $this->nomer_klienta,
        ]);

        $query->andFilterWhere(['like', 'fio_vracha', $this->fio_vracha])
            ->andFilterWhere(['like', 'diagnoz', $this->diagnoz]);

        return $dataProvider;
    }
}
