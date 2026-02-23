<?php

use yii\helpers\Html;

$this->title = 'Editar Producto';
?>

<div class="container mt-5">
    <h2 class="mb-4">✏️ Editar Producto</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>