<?php

$this->title = 'Crear Perfil';

?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">➕ Crear Perfil</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>