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
    public $email; // ✅ nuevo campo visual

    public function rules()
    {
        return [
            // Obligatorios
            [['username', 'password', 'telefono', 'codigo_postal', 'calle', 'email'], 'required'],

            // Username solo letras
            ['username', 'match',
                'pattern' => '/^[a-zA-Z]+$/',
                'message' => 'El usuario solo puede contener letras'
            ],

            ['username', 'string', 'min' => 4, 'max' => 50],
            ['password', 'string', 'min' => 6],

            // ✅ Validación de correo (completa y real)
            ['email', 'email', 'message' => 'Correo electrónico inválido'],

            // Validaciones UI
            ['telefono', 'match',
                'pattern' => '/^[0-9]{10}$/',
                'message' => 'Teléfono debe tener 10 dígitos'
            ],

            ['codigo_postal', 'match',
                'pattern' => '/^[0-9]{5}$/',
                'message' => 'Código postal inválido'
            ],
            ['calle', 'match',
            'pattern' => '/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s\.\-]+$/',
            'message' => 'La calle solo puede contener letras, números, espacios y . -'
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

    $user = new User();
    $user->username = $this->username;
    $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
    $user->auth_key = Yii::$app->security->generateRandomString();
    $user->created_at = date('Y-m-d H:i:s');
    $user->updated_at = date('Y-m-d H:i:s');

    return $user->save();
}

}
