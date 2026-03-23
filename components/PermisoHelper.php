<?php

namespace app\components;

use Yii;
use app\models\User;
use app\models\Modulo;
use app\models\PermisosPerfil;

class PermisoHelper
{
    public static function puedeVerModulo($nombreModulo)
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }

        $user = Yii::$app->user->identity;

        if (!$user || empty($user->idperfil)) {
            return false;
        }

        $modulo = Modulo::find()
            ->where(['strnombremodulo' => $nombreModulo])
            ->one();

        if (!$modulo) {
            return false;
        }

        $permiso = PermisosPerfil::find()
            ->where([
                'idperfil' => $user->idperfil,
                'idmodulo' => $modulo->id,
            ])
            ->one();

        return $permiso && (int)$permiso->bitconsulta === 1;
    }

    public static function puedeAgregar($nombreModulo)
    {
        return self::tienePermiso($nombreModulo, 'bitagregar');
    }

    public static function puedeEditar($nombreModulo)
    {
        return self::tienePermiso($nombreModulo, 'biteditar');
    }

    public static function puedeEliminar($nombreModulo)
    {
        return self::tienePermiso($nombreModulo, 'biteliminar');
    }

    public static function puedeDetalle($nombreModulo)
    {
        return self::tienePermiso($nombreModulo, 'bitdetalle');
    }

    public static function tienePermiso($nombreModulo, $campo)
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }

        $user = Yii::$app->user->identity;

        if (!$user || empty($user->idperfil)) {
            return false;
        }

        $modulo = Modulo::find()
            ->where(['strnombremodulo' => $nombreModulo])
            ->one();

        if (!$modulo) {
            return false;
        }

        $permiso = PermisosPerfil::find()
            ->where([
                'idperfil' => $user->idperfil,
                'idmodulo' => $modulo->id,
            ])
            ->one();

        return $permiso && isset($permiso->$campo) && (int)$permiso->$campo === 1;
    }
}