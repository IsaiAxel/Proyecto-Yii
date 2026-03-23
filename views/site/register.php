<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Seguridad | Crear usuario';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = 'Crear usuario';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .security-card {
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.92);
        padding: 35px;
        backdrop-filter: blur(10px);
    }

    .security-title {
        font-weight: 700;
        color: #00695C;
    }

    .security-subtitle {
        color: #004D40;
        font-size: 15px;
    }

    .section-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #004D40;
        margin-top: 18px;
        font-weight: 600;
    }

    .form-control:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0,191,165,0.25);
    }

    .btn-save {
        background-color: #00BFA5;
        border: none;
        font-weight: bold;
        color: white;
        transition: 0.3s ease;
    }

    .btn-save:hover {
        background-color: #009e88;
        transform: scale(1.03);
        color: white;
    }

    .btn-back {
        border: 2px solid #00BFA5;
        color: #00BFA5;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-back:hover {
        background-color: #00BFA5;
        color: white;
    }

    .form-text-custom {
        font-size: 13px;
        color: #546E7A;
        margin-top: -8px;
        margin-bottom: 10px;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="security-card shadow-lg">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="security-title mb-1">🔐 Crear usuario</h2>
                        <p class="security-subtitle mb-0">
                            Alta interna de cuentas para acceso al sistema administrativo
                        </p>
                    </div>

                    <?= Html::a('← Volver', ['site/home'], [
                        'class' => 'btn btn-back rounded-pill px-4'
                    ]) ?>
                </div>

                <?php $form = ActiveForm::begin(); ?>

                <div class="section-title">Datos de acceso</div>

                <?= $form->field($model, 'username')->textInput([
                    'placeholder' => 'Nombre de usuario'
                ]) ?>

                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Contraseña'
                ]) ?>

                <div class="form-text-custom">
                    La contraseña debe tener al menos 6 caracteres.
                </div>

                <div class="section-title">Información del usuario</div>

                <?= $form->field($model, 'telefono')->textInput([
                    'placeholder' => 'Ej. 7711234567',
                    'maxlength' => 10,
                    'inputmode' => 'numeric',
                    'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "").slice(0,10);'
                ]) ?>

                <?= $form->field($model, 'email')->textInput([
                    'placeholder' => 'correo@ejemplo.com',
                    'type' => 'email'
                ]) ?>

                <?= $form->field($model, 'codigo_postal')->textInput([
                    'placeholder' => 'Código Postal'
                ]) ?>

                <?= $form->field($model, 'calle')->textInput([
                    'placeholder' => 'Calle y número'
                ]) ?>

                <div class="d-grid mt-4">
                    <?= Html::submitButton('Guardar usuario', [
                        'class' => 'btn btn-save btn-lg rounded-pill shadow'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>