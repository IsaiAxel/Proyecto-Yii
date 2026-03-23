<?php

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Crear';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">➕ Crear Usuario</h2>

    <?= $this->render('_form', [
        'model' => $model,
        'perfiles' => $perfiles,
    ]) ?>
</div>