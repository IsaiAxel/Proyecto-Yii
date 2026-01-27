<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha2;

$this->title = 'Registro';
?>

<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    .register-card {
        border-radius: 20px;
        background: #ffffff;
        padding: 30px;
    }
    .register-title {
        font-weight: 600;
        color: #4a4a4a;
    }
    .section-title {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #888;
        margin-top: 20px;
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-md-7 col-lg-6">

        <div class="register-card shadow-lg">
            <div class="text-center mb-4">
                <h2 class="register-title">Crear Cuenta</h2>
                <p class="text-muted mb-0">Completa el formulario para registrarte</p>
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="section-title">Acceso</div>
            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Nombre de usuario']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña']) ?>

            <div class="section-title">Información personal</div>
            <?= $form->field($model, 'telefono')->textInput(['placeholder' => 'Ej. 7711234567']) ?>
            <?= $form->field($model, 'codigo_postal')->textInput(['placeholder' => 'Código Postal']) ?>
            <?= $form->field($model, 'calle')->textInput(['placeholder' => 'Calle y número']) ?>

            <div class="mt-3">
                <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha2::class) ?>
            </div>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Registrar usuario', [
                    'class' => 'btn btn-primary btn-lg rounded-pill'
                ]) ?>
            </div>

            <div class="text-center mt-3">
                <?= Html::a('¿Ya tienes cuenta? Inicia sesión', ['site/login'], ['class' => 'text-decoration-none']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>
