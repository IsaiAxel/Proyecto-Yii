<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['username', 'strcorreo'], 'safe'],
            [['idperfil', 'idestadousuario'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find()->with('perfil');

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

        if ($this->username) {
            $query->andWhere(['ilike', 'username', $this->username]);
        }

        if ($this->strcorreo) {
            $query->andWhere(['ilike', 'strcorreo', $this->strcorreo]);
        }

        if ($this->idperfil !== null && $this->idperfil !== '') {
            $query->andWhere(['idperfil' => $this->idperfil]);
        }

        if ($this->idestadousuario !== null && $this->idestadousuario !== '') {
            $query->andWhere(['idestadousuario' => $this->idestadousuario]);
        }

        return $dataProvider;
    }
}