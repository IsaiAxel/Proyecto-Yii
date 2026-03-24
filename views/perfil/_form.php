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
    }

    .modern-section-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .form-control, .form-select {
        border-radius: 16px;
        padding: 14px 16px;
        border: 1px solid #D9F1EC;
        transition: all .2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0, 191, 165, 0.16);
    }

    .btn-save-modern {
        background: linear-gradient(135deg, #00BFA5, #009688);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 24px;
        box-shadow: 0 10px 22px rgba(0, 150, 136, 0.20);
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

    .hint-box {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 16px;
        padding: 12px;
        font-size: 13px;
        color: #607D8B;
    }
</style>

<div class="modern-form-card">

    <!-- 🔥 BOTÓN VOLVER -->
    <div class="modern-top-actions">
        <?= Html::a('← Volver', ['index'], [
            'class' => 'btn btn-back-modern'
        ]) ?>
    </div>

    <div class="modern-form-header">
        <div class="modern-form-badge">SEGURIDAD · PERFILES</div>
        <h3 class="modern-form-title">Formulario de perfil</h3>
        <p class="modern-form-subtitle">
            Define los perfiles que controlan los accesos dentro del sistema.
        </p>
    </div>

    <?php $form = ActiveForm::begin(); ?>

        <div class="modern-section-title">Información del perfil</div>

        <?= $form->field($model, 'strnombreperfil')->textInput([
            'placeholder' => 'Ej. Administrador, Usuario, Invitado',
            'maxlength' => 50,
            'pattern' => '[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+',
            'title' => 'Solo letras y espacios',
            'oninput' => 'this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ\s]/g, "")'
        ]) ?>

        <div class="hint-box">
            El nombre del perfil debe ser claro para identificar sus permisos.
        </div>

        <?= $form->field($model, 'bitadministrador')->dropDownList([
            1 => 'Sí',
            0 => 'No',
        ], [
            'prompt' => '¿Es administrador?'
        ]) ?>

        <div class="modern-actions">
            <?= Html::submitButton('Guardar perfil', [
                'class' => 'btn btn-save-modern'
            ]) ?>

            <?= Html::a('Cancelar', ['index'], [
                'class' => 'btn btn-outline-secondary btn-cancel-modern'
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>