<?php

namespace app\models;

use yii\db\ActiveRecord;

class PermisosPerfil extends ActiveRecord
{
    public static function tableName()
    {
        return 'permisos_perfil';
    }

    public function rules()
    {
        return [
            [['idperfil', 'idmodulo'], 'required'],
            [['idperfil', 'idmodulo'], 'integer'],
            [['bitagregar', 'biteditar', 'bitconsulta', 'biteliminar', 'bitdetalle'], 'boolean'],
            [['idperfil', 'idmodulo'], 'unique', 'targetAttribute' => ['idperfil', 'idmodulo'], 'message' => 'Ya existe una configuración para ese perfil y módulo.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idperfil' => 'Perfil',
            'idmodulo' => 'Módulo',
            'bitagregar' => 'Agregar',
            'biteditar' => 'Editar',
            'bitconsulta' => 'Consultar',
            'biteliminar' => 'Eliminar',
            'bitdetalle' => 'Detalle',
        ];
    }

    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'idperfil']);
    }

    public function getModulo()
    {
        return $this->hasOne(Modulo::class, ['id' => 'idmodulo']);
    }
}