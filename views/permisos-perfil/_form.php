<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="card shadow rounded-4 border-0">
    <div class="card-body p-4">

        <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'idperfil')->dropDownList($perfiles, [
    'prompt' => 'Selecciona un perfil'
]) ?>

<?= $form->field($model, 'idmodulo')->dropDownList($modulos, [
    'prompt' => 'Selecciona un módulo'
]) ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'bitagregar')->checkbox() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'biteditar')->checkbox() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'bitconsulta')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'biteliminar')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'bitdetalle')->checkbox() ?>
            </div>
        </div>

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