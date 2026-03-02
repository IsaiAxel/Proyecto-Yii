<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha2;

$this->title = 'Iniciar sesión';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .login-card {
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        backdrop-filter: blur(10px);
    }

    .login-title {
        font-weight: 700;
        color: #00695C;
    }

    .section-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #004D40;
        margin-top: 10px;
    }

    .form-control:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0,191,165,0.25);
    }

    .btn-custom {
        background-color: #00BFA5;
        border: none;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
    }

    .btn-outline-custom {
        border: 2px solid #00BFA5;
        color: #00BFA5;
        font-weight: bold;
    }

    .btn-outline-custom:hover {
        background-color: #00BFA5;
        color: white;
    }

    .text-muted {
        color: #004D40 !important;
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">

        <div class="login-card shadow-lg">

            <div class="text-center mb-4">
                <h2 class="login-title">🌿 Iniciar sesión</h2>
                <p class="text-muted mb-0">Sistema Administrador de Forrajera</p>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="section-title">Credenciales</div>

            <?= $form->field($model, 'username')
                ->textInput(['placeholder' => 'Nombre de usuario'])
                ->label(false) ?>

            <?= $form->field($model, 'password')
                ->passwordInput(['placeholder' => 'Contraseña'])
                ->label(false) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'label' => 'Recordarme'
            ]) ?>

            <div class="mt-3">
                <?= $form->field($model, 'reCaptcha')
                    ->widget(ReCaptcha2::class)
                    ->label(false) ?>
            </div>

            <div class="d-grid mt-4 gap-2">
                <?= Html::submitButton(
                    'Entrar',
                    ['class' => 'btn btn-custom btn-lg rounded-pill shadow']
                ) ?>

                <?= Html::a(
                    'Crear una cuenta',
                    ['site/register'],
                    ['class' => 'btn btn-outline-custom btn-lg rounded-pill']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>