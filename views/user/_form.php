<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="card shadow rounded-4 border-0">
    <div class="card-body p-4">

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <?= $form->field($model, 'username')->textInput([
            'placeholder' => 'Nombre de usuario'
        ]) ?>

        <?= $form->field($model, 'password')->passwordInput([
            'placeholder' => $model->isNewRecord ? 'Contraseña' : 'Nueva contraseña (opcional)'
        ]) ?>

        <?= $form->field($model, 'idperfil')->dropDownList($perfiles, [
            'prompt' => 'Selecciona un perfil'
        ]) ?>

        <?= $form->field($model, 'idestadousuario')->dropDownList([
            1 => 'Activo',
            0 => 'Inactivo',
        ], ['prompt' => 'Selecciona un estado']) ?>

        <?= $form->field($model, 'strcorreo')->textInput([
            'placeholder' => 'correo@ejemplo.com',
            'type' => 'email'
        ]) ?>

        <?= $form->field($model, 'strnumerocelular')->textInput([
            'placeholder' => '7711234567',
            'maxlength' => 10,
            'inputmode' => 'numeric',
            'oninput' => 'this.value = this.value.replace(/[^0-9]/g, "").slice(0,10);'
        ]) ?>

        <?php if (!$model->isNewRecord && !empty($model->strimagenusuario)): ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Imagen actual</label><br>
                <?= Html::img('@web/uploads/' . $model->strimagenusuario, [
                    'style' => 'max-width:140px; height:auto;',
                    'class' => 'img-thumbnail shadow-sm'
                ]) ?>
            </div>
        <?php endif; ?>

        <?= $form->field($model, 'imageFile')->fileInput()->label('Imagen del usuario') ?>

        <div class="d-flex gap-2 mt-3">
            <?= Html::submitButton('Guardar', [
                'class' => 'btn btn-success rounded-pill px-4'
            ]) ?>

            <?= Html::a('Cancelar', ['index'], [
                'class' => 'btn btn-outline-secondary rounded-pill px-4'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>