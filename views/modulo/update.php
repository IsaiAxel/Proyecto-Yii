<?php

$this->title = 'Editar Módulo';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Módulo', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Editar';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-success fw-bold">✏️ Editar Módulo</h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>