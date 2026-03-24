<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Detalle';
?>

<div class="container mt-4">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-success fw-bold mb-0">🔎 Detalle del Perfil</h2>

                <div class="d-flex gap-2">
                   
                    <?= Html::a('Volver', ['index'], [
                        'class' => 'btn btn-outline-secondary rounded-pill px-4'
                    ]) ?>
                </div>
            </div>

           <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'strnombreperfil',
        [
            'attribute' => 'bitadministrador',
            'value' => $model->bitadministrador ? 'Sí' : 'No',
        ],
    ],
]) ?>
        </div>
    </div>
</div>