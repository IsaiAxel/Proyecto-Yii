<?php

$this->title = 'Editar Módulo';

?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">✏️ Editar Módulo</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>