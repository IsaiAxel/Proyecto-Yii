<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

?>

<div class="card shadow rounded-4">
    <div class="card-body">

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <?= $form->field($model, 'nombre')->textInput() ?>
        <?= $form->field($model, 'kilos')->input('number', ['step' => '0.01']) ?>
        <?= $form->field($model, 'precio')->input('number', ['step' => '0.01']) ?>
        <?= $form->field($model, 'stock')->input('number') ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="mt-3">
            <?= Html::submitButton('Guardar', [
                'class' => 'btn btn-primary rounded-pill'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>