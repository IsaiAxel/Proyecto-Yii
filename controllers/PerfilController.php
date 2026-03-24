<?php

namespace app\controllers;

use Yii;
use app\models\Perfil;
use app\models\PerfilSearch;
use app\components\PermisoHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class PerfilController extends Controller
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
        if (!PermisoHelper::puedeVerModulo('Perfil')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!PermisoHelper::puedeDetalle('Perfil')) {
            throw new ForbiddenHttpException('No tienes permiso para ver el detalle.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!PermisoHelper::puedeAgregar('Perfil')) {
            throw new ForbiddenHttpException('No tienes permiso para crear perfiles.');
        }

        $model = new Perfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Perfil creado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (!PermisoHelper::puedeEditar('Perfil')) {
            throw new ForbiddenHttpException('No tienes permiso para editar perfiles.');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Perfil actualizado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (!PermisoHelper::puedeEliminar('Perfil')) {
            throw new ForbiddenHttpException('No tienes permiso para eliminar perfiles.');
        }

        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Perfil eliminado correctamente.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Perfil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('El perfil solicitado no existe.');
    }
}