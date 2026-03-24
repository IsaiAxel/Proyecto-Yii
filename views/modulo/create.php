<?php

$this->title = 'Crear Módulo';

?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">➕ Crear Módulo</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>