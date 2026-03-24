<?php

namespace app\controllers;

use Yii;
use app\models\Modulo;
use app\models\ModuloSearch;
use app\components\PermisoHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ModuloController extends Controller
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
        if (!PermisoHelper::puedeVerModulo('Modulo')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        $searchModel = new ModuloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!PermisoHelper::puedeDetalle('Modulo')) {
            throw new ForbiddenHttpException('No tienes permiso para ver el detalle.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!PermisoHelper::puedeAgregar('Modulo')) {
            throw new ForbiddenHttpException('No tienes permiso para crear módulos.');
        }

        $model = new Modulo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Módulo creado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        if (!PermisoHelper::puedeEditar('Modulo')) {
            throw new ForbiddenHttpException('No tienes permiso para editar módulos.');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Módulo actualizado correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (!PermisoHelper::puedeEliminar('Modulo')) {
            throw new ForbiddenHttpException('No tienes permiso para eliminar módulos.');
        }

        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Módulo eliminado correctamente.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Modulo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('El módulo solicitado no existe.');
    }
}