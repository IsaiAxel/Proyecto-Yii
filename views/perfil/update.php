<?php

use yii\helpers\Html;

$this->title = 'Editar Perfil';

?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">✏️ Editar Perfil</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>