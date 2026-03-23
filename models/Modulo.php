<?php

namespace app\models;

use yii\db\ActiveRecord;

class Modulo extends ActiveRecord
{
    public static function tableName()
    {
        return 'modulo';
    }

    public function rules()
    {
        return [
            [['strnombremodulo'], 'required'],
            [['strnombremodulo'], 'string', 'max' => 100],
            [['strnombremodulo'], 'trim'],
            [['strnombremodulo'], 'unique', 'message' => 'Este módulo ya existe.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'strnombremodulo' => 'Nombre del módulo',
        ];
    }
}