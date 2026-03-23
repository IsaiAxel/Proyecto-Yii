<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Permisos Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Detalle';
?>

<div class="container mt-4">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-success fw-bold mb-0">🔎 Detalle del Permiso</h2>

                <div class="d-flex gap-2">
                    <?= Html::a('Editar', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-warning rounded-pill px-4'
                    ]) ?>

                    <?= Html::a('Volver', ['index'], [
                        'class' => 'btn btn-outline-secondary rounded-pill px-4'
                    ]) ?>
                </div>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'label' => 'Perfil',
                        'value' => $model->perfil ? $model->perfil->strnombreperfil : 'N/A',
                    ],
                    [
                        'label' => 'Módulo',
                        'value' => $model->modulo ? $model->modulo->strnombremodulo : 'N/A',
                    ],
                    [
                        'attribute' => 'bitagregar',
                        'value' => $model->bitagregar ? 'Sí' : 'No',
                    ],
                    [
                        'attribute' => 'biteditar',
                        'value' => $model->biteditar ? 'Sí' : 'No',
                    ],
                    [
                        'attribute' => 'bitconsulta',
                        'value' => $model->bitconsulta ? 'Sí' : 'No',
                    ],
                    [
                        'attribute' => 'biteliminar',
                        'value' => $model->biteliminar ? 'Sí' : 'No',
                    ],
                    [
                        'attribute' => 'bitdetalle',
                        'value' => $model->bitdetalle ? 'Sí' : 'No',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>