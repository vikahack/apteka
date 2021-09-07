<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Sklad;

/**
 * SkladSearch represents the model behind the search form of `app\modules\admin\models\Sklad`.
 */
class SkladSearch extends Sklad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'kolichestvo', 'kritich_norma'], 'integer'],
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
        $query = Sklad::find();

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
            'kolichestvo' => $this->kolichestvo,
            'kritich_norma' => $this->kritich_norma,
        ]);

        return $dataProvider;
    }
}
