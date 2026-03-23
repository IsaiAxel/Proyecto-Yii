<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Perfil;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
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
        $searchModel = new UserSearch();
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
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                $fileName = 'user_' . time() . '_' . uniqid() . '.' . $model->imageFile->extension;
                $uploadPath = Yii::getAlias('@webroot/uploads/' . $fileName);

                if ($model->imageFile->saveAs($uploadPath)) {
                    $model->strimagenusuario = $fileName;
                }
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Usuario creado correctamente.');
                return $this->redirect(['index']);
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
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                $fileName = 'user_' . time() . '_' . uniqid() . '.' . $model->imageFile->extension;
                $uploadPath = Yii::getAlias('@webroot/uploads/' . $fileName);

                if ($model->imageFile->saveAs($uploadPath)) {
                    $model->strimagenusuario = $fileName;
                }
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Usuario actualizado correctamente.');
                return $this->redirect(['index']);
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