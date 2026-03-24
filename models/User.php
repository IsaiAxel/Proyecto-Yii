<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

class User extends ActiveRecord implements IdentityInterface
{
    public $imageFile;
    public $password;

    public static function tableName()
    {
        return 'user';
    }

    /* ===== IdentityInterface ===== */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
{
    return static::findOne(['username' => $username]);
}

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /* ===== Password ===== */

    public function validatePassword($password)
{
    return Yii::$app->security->validatePassword($password, $this->password_hash);
}

    /* ===== Relaciones ===== */

    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'idperfil']);
    }

    /* ===== Reglas ===== */

    public function rules()
    {
        return [
            [['username', 'idperfil', 'idestadousuario'], 'required'],
            [['idperfil', 'idestadousuario'], 'integer'],

            [['username'], 'string', 'max' => 50],
            [['username'], 'unique', 'message' => 'Este usuario ya existe.'],

            [['password'], 'string', 'min' => 6],
            [['password'], 'required', 'on' => 'create'],
            [['password'], 'safe', 'on' => 'update'],

            [['strcorreo'], 'email', 'message' => 'Correo inválido'],

            [['strnumerocelular'], 'match',
                'pattern' => '/^[0-9]{10}$/',
                'message' => 'El número celular debe tener 10 dígitos.'
            ],

            [['strcorreo'], 'string', 'max' => 150],
            [['strnumerocelular'], 'string', 'max' => 15],
            [['strimagenusuario'], 'string'],

            [['imageFile'], 'file',
                'extensions' => ['png', 'jpg', 'jpeg'],
                'skipOnEmpty' => true,
                'maxSize' => 2 * 1024 * 1024,
                'tooBig' => 'La imagen no puede pesar más de 2MB.',
                'wrongExtension' => 'Solo se permiten imágenes PNG o JPG.'
            ],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios['create'] = [
            'username',
            'password',
            'idperfil',
            'idestadousuario',
            'strcorreo',
            'strnumerocelular',
            'imageFile'
        ];

        $scenarios['update'] = [
            'username',
            'password',
            'idperfil',
            'idestadousuario',
            'strcorreo',
            'strnumerocelular',
            'imageFile'
        ];

        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',
            'password_hash' => 'Contraseña',
            'idperfil' => 'Perfil',
            'idestadousuario' => 'Estado',
            'strcorreo' => 'Correo',
            'strnumerocelular' => 'Número celular',
            'strimagenusuario' => 'Imagen',
            'imageFile' => 'Imagen del usuario',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if (!empty($this->password)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        if ($this->isNewRecord && empty($this->auth_key)) {
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        $this->updated_at = date('Y-m-d H:i:s');

        if ($this->isNewRecord && empty($this->created_at)) {
            $this->created_at = date('Y-m-d H:i:s');
        }

        return true;
    }
}