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

    <?php if (!$model->isNewRecord && !empty($model->imagen)): ?>
      <div class="mb-3">
        <label class="form-label fw-semibold">Imagen actual</label><br>
        <?= Html::img($model->imagen, [
          'style' => 'max-width:180px; height:auto;',
          'class' => 'img-thumbnail shadow-sm'
        ]) ?>
        <div class="form-text">
          Si quieres reemplazarla, sube una nueva. Si no, deja este campo vacío.
        </div>
      </div>
    <?php endif; ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Cambiar imagen (opcional)') ?>

    <div class="mt-3">
      <?= Html::submitButton('Guardar', [
        'class' => 'btn btn-primary rounded-pill'
      ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>