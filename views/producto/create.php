<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Nuevo Producto';
?>

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-body">

            <h3 class="mb-4 text-center">📦 Registrar Producto</h3>

            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

            <?= $form->field($model, 'nombre')->textInput() ?>

            <?= $form->field($model, 'kilos')->input('number', ['step' => '0.01']) ?>

            <?= $form->field($model, 'precio')->input('number', ['step' => '0.01']) ?>

            <?= $form->field($model, 'stock')->input('number') ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Guardar Producto', [
                    'class' => 'btn btn-success btn-lg rounded-pill'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
