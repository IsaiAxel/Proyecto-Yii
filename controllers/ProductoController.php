<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Producto;
use app\components\SupabaseStorage;

class ProductoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile) {
                $model->imagen = SupabaseStorage::upload($model->imageFile);
            }

           if ($model->save()) {
    Yii::$app->session->setFlash('success', 'Producto registrado');
    return $this->refresh();
}

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
