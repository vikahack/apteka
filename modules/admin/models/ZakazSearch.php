<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Zakaz;

/**
 * ZakazSearch represents the model behind the search form of `app\modules\admin\models\Zakaz`.
 */
class ZakazSearch extends Zakaz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_zakaza', 'nomer_recepta', 'stoimost'], 'integer'],
            [['zakaz_l', 'data_priema', 'data_izgotovleniya', 'data_vidachi', 'status', 'zabral_v_srok'], 'safe'],
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
        $query = Zakaz::find();

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
            'nomer_zakaza' => $this->nomer_zakaza,
            'nomer_recepta' => $this->nomer_recepta,
            'data_priema' => $this->data_priema,
            'data_izgotovleniya' => $this->data_izgotovleniya,
            'data_vidachi' => $this->data_vidachi,
            'stoimost' => $this->stoimost,
        ]);

        $query->andFilterWhere(['like', 'zakaz_l', $this->zakaz_l])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'zabral_v_srok', $this->zabral_v_srok]);

        return $dataProvider;
    }
}
