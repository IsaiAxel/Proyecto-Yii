<?php

namespace app\models;

use yii\db\ActiveRecord;

class Perfil extends ActiveRecord
{
    public static function tableName()
    {
        return 'perfil';
    }

    public function rules()
    {
        return [
            [['strnombreperfil'], 'required'],
            [['bitadministrador'], 'boolean'],
            [['strnombreperfil'], 'string', 'max' => 100],
            [['strnombreperfil'], 'trim'],
            [['strnombreperfil'], 'unique', 'message' => 'Este perfil ya existe.'],
            [['strnombreperfil'], 'match',
                'pattern' => '/^[a-zA-ZÁÉÍÓÚáéíóúÑñ\s]+$/u',
                'message' => 'El nombre del perfil solo puede contener letras y espacios.'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'strnombreperfil' => 'Nombre del perfil',
            'bitadministrador' => 'Administrador',
        ];
    }
}