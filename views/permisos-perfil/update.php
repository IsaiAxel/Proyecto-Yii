<?php

$this->title = 'Editar Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Permisos Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">✏️ Editar Permiso</h2>

    <?= $this->render('_form', [
        'model' => $model,
        'perfiles' => $perfiles,
        'modulos' => $modulos,
    ]) ?>
</div>