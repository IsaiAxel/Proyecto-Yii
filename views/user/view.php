<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Detalle';
?>

<div class="container mt-4">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-success fw-bold mb-0">🔎 Detalle del Usuario</h2>

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
                    'username',
                    [
                        'label' => 'Perfil',
                        'value' => $model->perfil ? $model->perfil->strnombreperfil : 'N/A',
                    ],
                    [
                        'attribute' => 'idestadousuario',
                        'value' => $model->idestadousuario == 1 ? 'Activo' : 'Inactivo',
                    ],
                    'strcorreo',
                    'strnumerocelular',
                    [
                        'label' => 'Imagen',
                        'format' => 'html',
                        'value' => $model->strimagenusuario
                            ? Html::img('@web/uploads/' . $model->strimagenusuario, ['width' => '120'])
                            : 'Sin imagen',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>