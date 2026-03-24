<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Producto;
use app\models\User;
use app\components\PermisoHelper;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'home', 'profile', 'principal11', 'principal12', 'principal21', 'principal22'],
                'rules' => [
                    [
                        'actions' => ['logout', 'home', 'profile', 'principal11', 'principal12', 'principal21', 'principal22'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/home']);
        }

        return $this->redirect(['site/login']);
    }

public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->redirect(['site/home']);
    }

    $model = new LoginForm();

    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->redirect(['site/home']);
    }

    return $this->render('login', [
        'model' => $model,
    ]);
}

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new \app\models\RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            Yii::$app->session->setFlash('success', 'Usuario creado correctamente.');
            return $this->redirect(['site/login']);
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionContact()
    {
        return $this->render('contact', [
            'message' => 'Hola Mundo'
        ]);
    }

    public function actionMantenimiento()
    {
        return $this->render('mantenimiento');
    }

    public function actionHome()
    {
        $totalProductos = Producto::find()->count();
        $stockTotal = Producto::find()->sum('stock');
        $valorInventario = Producto::find()->sum('precio * stock');

        return $this->render('home', [
            'totalProductos' => $totalProductos,
            'stockTotal' => $stockTotal,
            'valorInventario' => $valorInventario,
        ]);
    }

    public function actionProfile()
    {
        $user = User::find()
            ->with('perfil')
            ->where(['id' => Yii::$app->user->id])
            ->one();

        return $this->render('profile', [
            'user' => $user,
        ]);
    }

    public function actionPrincipal11()
    {
        if (!PermisoHelper::puedeVerModulo('Principal 1.1')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        return $this->render('principal-module', [
            'titulo' => 'Principal 1.1',
            'breadcrumbPadre' => 'Principal 1',
            'icono' => '📁',
        ]);
    }

    public function actionPrincipal12()
    {
        if (!PermisoHelper::puedeVerModulo('Principal 1.2')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        return $this->render('principal-module', [
            'titulo' => 'Principal 1.2',
            'breadcrumbPadre' => 'Principal 1',
            'icono' => '📂',
        ]);
    }

    public function actionPrincipal21()
    {
        if (!PermisoHelper::puedeVerModulo('Principal 2.1')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        return $this->render('principal-module', [
            'titulo' => 'Principal 2.1',
            'breadcrumbPadre' => 'Principal 2',
            'icono' => '🗂️',
        ]);
    }

    public function actionPrincipal22()
    {
        if (!PermisoHelper::puedeVerModulo('Principal 2.2')) {
            throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
        }

        return $this->render('principal-module', [
            'titulo' => 'Principal 2.2',
            'breadcrumbPadre' => 'Principal 2',
            'icono' => '🗃️',
        ]);
    }
}