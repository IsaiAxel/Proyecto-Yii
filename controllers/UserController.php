<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Perfil;
use app\components\PermisoHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UserController extends Controller
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
        if (!PermisoHelper::puedeVerModulo('Usuario')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!PermisoHelper::puedeDetalle('Usuario')) {
            throw new ForbiddenHttpException('No tienes permiso para ver el detalle.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!PermisoHelper::puedeAgregar('Usuario')) {
            throw new ForbiddenHttpException('No tienes permiso para crear usuarios.');
        }

        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
                if ($model->imageFile) {
                    $fileName = 'user_' . time() . '_' . uniqid() . '.' . $model->imageFile->extension;

                    $uploadDir = Yii::getAlias('@webroot/uploads');
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0775, true);
                    }

                    $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

                    if ($model->imageFile->saveAs($uploadPath)) {
                        $model->strimagenusuario = $fileName;
                    }
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Usuario creado correctamente.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'perfiles' => ArrayHelper::map(
                Perfil::find()->asArray()->all(),
                'id',
                'strnombreperfil'
            ),
        ]);
    }

    public function actionUpdate($id)
    {
        if (!PermisoHelper::puedeEditar('Usuario')) {
            throw new ForbiddenHttpException('No tienes permiso para editar usuarios.');
        }

        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
                if ($model->imageFile) {
                    $fileName = 'user_' . time() . '_' . uniqid() . '.' . $model->imageFile->extension;

                    $uploadDir = Yii::getAlias('@webroot/uploads');
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0775, true);
                    }

                    $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

                    if ($model->imageFile->saveAs($uploadPath)) {
                        $model->strimagenusuario = $fileName;
                    }
                }

                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Usuario actualizado correctamente.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'perfiles' => ArrayHelper::map(
                Perfil::find()->asArray()->all(),
                'id',
                'strnombreperfil'
            ),
        ]);
    }

    public function actionDelete($id)
    {
        if (!PermisoHelper::puedeEliminar('Usuario')) {
            throw new ForbiddenHttpException('No tienes permiso para eliminar usuarios.');
        }

        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Usuario eliminado correctamente.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('El usuario solicitado no existe.');
    }
}