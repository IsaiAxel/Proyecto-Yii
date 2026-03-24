<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<style>
    .modern-form-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 28px;
        padding: 32px;
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(224, 242, 241, 0.9);
        backdrop-filter: blur(10px);
    }

    .modern-form-header {
        margin-bottom: 26px;
    }

    .modern-top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        margin-bottom: 8px;
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

    .modern-form-card .form-control {
        border-radius: 16px;
        padding: 14px 16px;
        border: 1px solid #D9F1EC;
        transition: all .2s ease;
    }

    .modern-form-card .form-control:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0, 191, 165, 0.16);
    }

    .field-hint-box {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        color: #607D8B;
        border-radius: 16px;
        padding: 12px 14px;
        font-size: 13px;
        margin-top: 4px;
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

    <!-- 🔥 BOTÓN VOLVER -->
    <div class="modern-top-actions">
        <?= Html::a('← Volver', ['index'], [
            'class' => 'btn btn-back-modern'
        ]) ?>
    </div>

    <div class="modern-form-header">
        <div class="modern-form-badge">SEGURIDAD · MÓDULOS</div>
        <h3 class="modern-form-title">Formulario de módulo</h3>
        <p class="modern-form-subtitle">
            Registra o actualiza la información del módulo que se utilizará dentro del sistema.
        </p>
    </div>

    <?php $form = ActiveForm::begin(); ?>

        <div class="modern-section-title">Información general</div>

        <?= $form->field($model, 'strnombremodulo')->textInput([
            'placeholder' => 'Ej. Usuario, Perfil, Principal 1.1',
            'maxlength' => 50,
            'pattern' => '[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s\.]+',
            'title' => 'Solo letras, números, espacios y punto',
            'oninput' => 'this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s\.]/g, "")'
        ]) ?>

        <div class="field-hint-box">
            Usa un nombre claro y corto para identificar el módulo dentro del sistema.
        </div>

        <div class="modern-actions">
            <?= Html::submitButton('Guardar módulo', [
                'class' => 'btn btn-save-modern'
            ]) ?>

            <?= Html::a('Cancelar', ['index'], [
                'class' => 'btn btn-outline-secondary btn-cancel-modern'
            ]) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>