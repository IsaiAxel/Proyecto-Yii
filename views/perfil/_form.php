<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="card shadow rounded-4 border-0">
    <div class="card-body p-4">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'strnombreperfil')->textInput([
    'placeholder' => 'Ej. Administrador'
]) ?>

<?= $form->field($model, 'bitadministrador')->dropDownList([
    1 => 'Sí',
    0 => 'No',
], ['prompt' => 'Selecciona una opción']) ?>

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