<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<style>
    .modern-form-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 30px;
        padding: 32px;
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(224, 242, 241, 0.95);
        backdrop-filter: blur(10px);
    }

    .modern-top-actions {
        margin-bottom: 15px;
    }

    .btn-back-modern {
        background: #E0F2F1;
        color: #00695C;
        border: none;
        border-radius: 999px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .btn-back-modern:hover {
        background: #B2DFDB;
        color: #004D40;
    }

    .modern-form-header {
        margin-bottom: 26px;
    }

    .modern-form-badge {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 12px;
    }

    .modern-form-title {
        font-size: 28px;
        font-weight: 800;
        color: #00695C;
        margin-bottom: 6px;
    }

    .modern-form-subtitle {
        color: #607D8B;
        font-size: 15px;
        margin-bottom: 0;
    }

    .modern-section-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .modern-form-card .form-label {
        font-weight: 700;
        color: #004D40;
        margin-bottom: 8px;
    }

    .modern-form-card .form-control,
    .modern-form-card .form-select {
        border-radius: 16px;
        padding: 14px 16px;
        border: 1px solid #D9F1EC;
        box-shadow: none;
        transition: all .2s ease;
    }

    .modern-form-card .form-control:focus,
    .modern-form-card .form-select:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0, 191, 165, 0.16);
    }

    .hint-box {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 16px;
        padding: 12px 14px;
        font-size: 13px;
        color: #607D8B;
        margin-top: 4px;
    }

    .image-preview-box {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 20px;
        padding: 16px;
        margin-bottom: 18px;
    }

    .image-preview-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .image-preview-thumb {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 18px;
        border: 2px solid #E0F2F1;
        box-shadow: 0 8px 18px rgba(0,0,0,.08);
    }

    .btn-save-modern {
        background: linear-gradient(135deg, #00BFA5, #009688);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 24px;
        box-shadow: 0 10px 22px rgba(0, 150, 136, 0.20);
        transition: all .2s ease;
    }

    .btn-save-modern:hover {
        color: white;
        transform: translateY(-1px);
    }

    .btn-cancel-modern {
        border-radius: 999px;
        padding: 12px 24px;
        font-weight: 700;
    }

    .modern-actions {
        margin-top: 28px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
</style>

<div class="modern-form-card">

    <div class="modern-top-actions">
        <?= Html::a('← Volver', ['index'], [
            'class' => 'btn btn-back-modern'
        ]) ?>
    </div>

    <div class="modern-form-header">
        <div class="modern-form-badge">SEGURIDAD · USUARIOS</div>
        <h3 class="modern-form-title">Formulario de usuario</h3>
        <p class="modern-form-subtitle">
            Registra o actualiza la información de acceso, perfil, estado y datos de contacto del usuario.
        </p>
    </div>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

        <div class="modern-section-title">Información de acceso</div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'username')->textInput([
                    'placeholder' => 'Nombre de usuario',
                    'maxlength' => 50,
                    'pattern' => '[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+',
                    'title' => 'Solo letras y espacios',
                    'oninput' => 'this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ\s]/g, "")'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => $model->isNewRecord ? 'Contraseña' : 'Nueva contraseña (opcional)'
                ]) ?>
            </div>
        </div>

        <div class="hint-box">
            El nombre de usuario solo permite letras y espacios. La contraseña debe cumplir con la longitud mínima configurada en el sistema.
        </div>

        <div class="modern-section-title mt-4">Configuración del usuario</div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'idperfil')->dropDownList($perfiles, [
                    'prompt' => 'Selecciona un perfil'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'idestadousuario')->dropDownList([
                    1 => 'Activo',
                    0 => 'Inactivo',
                ], [
                    'prompt' => 'Selecciona un estado'
                ]) ?>
            </div>
        </div>

        <div class="modern-section-title mt-4">Datos de contacto</div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'strcorreo')->textInput([
                    'placeholder' => 'correo@ejemplo.com',
                    'type' => 'email'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'strnumerocelular')->textInput([
                    'placeholder' => '7711234567',
                    'maxlength' => 10,
                    'inputmode' => 'numeric',
                    'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "").slice(0,10);'
                ]) ?>
            </div>
        </div>

        <?php if (!$model->isNewRecord && !empty($model->strimagenusuario)): ?>
            <div class="image-preview-box">
                <div class="image-preview-title">Imagen actual</div>
                <?= Html::img($model->strimagenusuario, [
    'class' => 'user-avatar-large'
])?>
            </div>
        <?php endif; ?>

        <div class="modern-section-title mt-4">Imagen del usuario</div>

        <?= $form->field($model, 'imageFile')->fileInput()->label('Selecciona una imagen') ?>

        <div class="hint-box">
            Puedes subir una imagen para identificar visualmente al usuario dentro del sistema.
        </div>

        <div class="modern-actions">
            <?= Html::submitButton('Guardar usuario', [
                'class' => 'btn btn-save-modern'
            ]) ?>

            <?= Html::a('Cancelar', ['index'], [
                'class' => 'btn btn-outline-secondary btn-cancel-modern'
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>