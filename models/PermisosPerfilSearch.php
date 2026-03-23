<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PermisosPerfilSearch extends PermisosPerfil
{
    public function rules()
    {
        return [
            [['idperfil', 'idmodulo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PermisosPerfil::find()->with(['perfil', 'modulo']);

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

        return $dataProvider;
    }
}