<?php

$this->title = 'Editar Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">✏️ Editar Usuario</h2>

    <?= $this->render('_form', [
        'model' => $model,
        'perfiles' => $perfiles,
    ]) ?>
</div>