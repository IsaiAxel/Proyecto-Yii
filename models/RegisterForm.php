<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;

    // 🔹 Campos extra SOLO para el formulario
    public $telefono;
    public $codigo_postal;
    public $calle;

    public function rules()
    {
        return [
            // Obligatorios
            [['username', 'password', 'telefono', 'codigo_postal', 'calle'], 'required'],

            // ✅ Username SOLO letras
            ['username', 'match',
                'pattern' => '/^[a-zA-Z]+$/',
                'message' => 'El usuario solo puede contener letras (sin números ni caracteres especiales)'
            ],

            ['username', 'string', 'min' => 4, 'max' => 50],
            ['password', 'string', 'min' => 6],

            // Validaciones UI
            ['telefono', 'match',
                'pattern' => '/^[0-9]{10}$/',
                'message' => 'Teléfono debe tener 10 dígitos'
            ],

            ['codigo_postal', 'match',
                'pattern' => '/^[0-9]{5}$/',
                'message' => 'Código postal inválido'
            ],

            ['username', 'unique',
                'targetClass' => User::class,
                'message' => 'Este usuario ya existe'
            ],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        // ✅ SOLO se guarda lo que ya funcionaba
        $user = new User();
        $user->username = $this->username;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');

        return $user->save();
    }
}
