<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Producto; 

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'home'],
                'rules' => [
    [
        'actions' => ['logout', 'home'],
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
public function actionIndex()
{
    // Si ya está logueado, mándalo a tu home interno
    if (!Yii::$app->user->isGuest) {
        return $this->redirect(['site/home']); // o producto/index, lo que uses
    }

    // Si NO está logueado, muestra login directo
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
    /**
     * Displays about page.
     *
     * @return string
     */
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
    $this->view->title = 'Perfil';

    return $this->render('profile', [
        'user' => Yii::$app->user->identity,
    ]);
}
}
