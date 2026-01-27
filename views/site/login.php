<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha2;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    .login-card {
        border-radius: 20px;
        background: #ffffff;
        padding: 30px;
    }
    .login-title {
        font-weight: 600;
        color: #4a4a4a;
    }
    .section-title {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #888;
        margin-top: 15px;
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-md-6 col-lg-5">

        <div class="login-card shadow-lg">
            <div class="text-center mb-4">
                <h2 class="login-title">🔐 Iniciar sesión</h2>
                <p class="text-muted mb-0">Accede con tus credenciales</p>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="section-title">Credenciales</div>

            <?= $form->field($model, 'username')
                ->textInput(['placeholder' => 'Usuario']) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['placeholder' => 'Contraseña']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="mt-3">
                <?= $form->field($model, 'reCaptcha')
                    ->widget(ReCaptcha2::class)
                    ->label(false) ?>
            </div>

            <div class="d-grid mt-4 gap-2">
                <?= Html::submitButton(
                    'Entrar',
                    ['class' => 'btn btn-primary btn-lg rounded-pill']
                ) ?>

                <?= Html::a(
                    'Crear una cuenta',
                    ['site/register'],
                    ['class' => 'btn btn-outline-success btn-lg rounded-pill']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>
