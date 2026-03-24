<?php

namespace app\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $reCaptcha;

    private $_user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
            ['reCaptcha', ReCaptchaValidator2::class, 'uncheckedMessage' => 'Confirma que no eres un robot.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'rememberMe' => 'Recordarme',
            'reCaptcha' => 'Verificación',
        ];
    }

    public function validatePassword($attribute)
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = $this->getUser();

        // Usuario no existe
        if (!$user) {
            $this->addError($attribute, 'Usuario o contraseña incorrectos.');
            return;
        }

        // Usuario inactivo
        if ((int)$user->idestadousuario !== 1) {
            $this->addError('username', 'El usuario está inactivo. Contacta al administrador.');
            return;
        }

        // Contraseña incorrecta
        if (!$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Usuario o contraseña incorrectos.');
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login(
                $this->getUser(),
                $this->rememberMe ? 3600 * 24 * 30 : 0
            );
        }

        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}