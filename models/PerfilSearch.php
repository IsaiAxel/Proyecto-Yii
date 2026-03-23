<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PerfilSearch extends Perfil
{
    public function rules()
    {
        return [
            [['strnombreperfil'], 'safe'],
            [['bitadministrador'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Perfil::find();

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

        if ($this->strnombreperfil) {
            $query->andWhere(['ilike', 'strnombreperfil', $this->strnombreperfil]);
        }

        if ($this->bitadministrador !== '' && $this->bitadministrador !== null) {
            $query->andWhere(['bitadministrador' => $this->bitadministrador]);
        }

        return $dataProvider;
    }
}