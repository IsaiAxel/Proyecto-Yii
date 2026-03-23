<?php

namespace app\controllers;

use Yii;
use app\models\PermisosPerfil;
use app\models\PermisosPerfilSearch;
use app\models\Perfil;
use app\models\Modulo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PermisosPerfilController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new PermisosPerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new PermisosPerfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Permiso creado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'perfiles' => ArrayHelper::map(
                Perfil::find()->asArray()->all(),
                'id',
                'strnombreperfil'
            ),
            'modulos' => ArrayHelper::map(
                Modulo::find()->asArray()->all(),
                'id',
                'strnombremodulo'
            ),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Permiso actualizado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'perfiles' => ArrayHelper::map(
                Perfil::find()->asArray()->all(),
                'id',
                'strnombreperfil'
            ),
            'modulos' => ArrayHelper::map(
                Modulo::find()->asArray()->all(),
                'id',
                'strnombremodulo'
            ),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Permiso eliminado correctamente.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PermisosPerfil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('El permiso solicitado no existe.');
    }
public function actionAsignar()
{
    $perfilId = Yii::$app->request->get('idperfil');

    $perfiles = ArrayHelper::map(
        Perfil::find()->asArray()->all(),
        'id',
        'strnombreperfil'
    );

    $modulos = Modulo::find()->all();

    $permisos = [];

    if ($perfilId) {
        $permisos = PermisosPerfil::find()
            ->where(['idperfil' => $perfilId])
            ->indexBy('idmodulo')
            ->all();
    }

    return $this->render('asignar', [
        'perfiles' => $perfiles,
        'perfilId' => $perfilId,
        'modulos' => $modulos,
        'permisos' => $permisos,
    ]);
}
public function actionGuardar()
{
    $perfilId = Yii::$app->request->post('idperfil');
    $permisos = Yii::$app->request->post('permisos', []);

    foreach ($permisos as $moduloId => $datos) {
        $model = \app\models\PermisosPerfil::findOne([
            'idperfil' => $perfilId,
            'idmodulo' => $moduloId,
        ]);

        if (!$model) {
            $model = new \app\models\PermisosPerfil();
            $model->idperfil = $perfilId;
            $model->idmodulo = $moduloId;
        }

        $model->bitagregar = isset($datos['bitagregar']) ? 1 : 0;
        $model->biteditar = isset($datos['biteditar']) ? 1 : 0;
        $model->biteliminar = isset($datos['biteliminar']) ? 1 : 0;
        $model->bitconsulta = isset($datos['bitconsulta']) ? 1 : 0;
        $model->bitdetalle = isset($datos['bitdetalle']) ? 1 : 0;

        $model->save(false);
    }

    Yii::$app->session->setFlash('success', 'Permisos guardados correctamente.');
    return $this->redirect(['asignar', 'idperfil' => $perfilId]);
}
}