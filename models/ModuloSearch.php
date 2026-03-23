<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ModuloSearch extends Modulo
{
    public function rules()
    {
        return [
            [['strnombremodulo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Modulo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($this->strnombremodulo) {
            $query->andWhere(['ilike', 'strnombremodulo', $this->strnombremodulo]);
        }

        return $dataProvider;
    }
}