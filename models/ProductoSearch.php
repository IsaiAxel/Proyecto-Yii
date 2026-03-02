<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductoSearch extends Producto
{
    public function rules()
    {
        return [
            [['nombre'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Producto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5, // ✅ 5 productos por página
            ],
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // ✅ Búsqueda por nombre (LIKE, case-insensitive en Postgres usando ILIKE)
        if (!empty($this->nombre)) {
            $query->andWhere(['ilike', 'nombre', $this->nombre]);
        }

        return $dataProvider;
    }
}