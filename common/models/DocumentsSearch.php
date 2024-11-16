<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Documents;

/**
 * DocumentsSearch represents the model behind the search form of `common\models\Documents`.
 */
class DocumentsSearch extends Documents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['document_code', 'document_date', 'resolution_date', 'resolution_number', 'issuer_name', 'executor_name', 'signing_organization', 'validity_period_start', 'validity_period_end', 'created_at', 'updated_at'], 'safe'],
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
        $query = Documents::find();

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
            'document_date' => $this->document_date,
            'resolution_date' => $this->resolution_date,
            'validity_period_start' => $this->validity_period_start,
            'validity_period_end' => $this->validity_period_end,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'document_code', $this->document_code])
            ->andFilterWhere(['ilike', 'resolution_number', $this->resolution_number])
            ->andFilterWhere(['ilike', 'issuer_name', $this->issuer_name])
            ->andFilterWhere(['ilike', 'executor_name', $this->executor_name])
            ->andFilterWhere(['ilike', 'signing_organization', $this->signing_organization]);

        return $dataProvider;
    }
}
