<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\IzgotavlivaemieLekarstva;

/**
 * IzgotavlivaemieLekarstvaSearch represents the model behind the search form of `app\modules\admin\models\IzgotavlivaemieLekarstva`.
 */
class IzgotavlivaemieLekarstvaSearch extends IzgotavlivaemieLekarstva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'stoimost'], 'integer'],
            [['naimenovanie', 'nomer_na_sklade', 'forma', 'sposob_prigotovleniya'], 'safe'],
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
        $query = IzgotavlivaemieLekarstva::find();

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
            'nomer_lekarstva' => $this->nomer_lekarstva,
            'stoimost' => $this->stoimost,
        ]);

        $query->andFilterWhere(['like', 'naimenovanie', $this->naimenovanie])
            ->andFilterWhere(['like', 'nomer_na_sklade', $this->nomer_na_sklade])
            ->andFilterWhere(['like', 'forma', $this->forma])
            ->andFilterWhere(['like', 'sposob_prigotovleniya', $this->sposob_prigotovleniya]);

        return $dataProvider;
    }
}
