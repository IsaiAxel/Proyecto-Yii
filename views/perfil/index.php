<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\ForbiddenHttpException;
use app\components\PermisoHelper;

if (!PermisoHelper::puedeVerModulo('Perfil')) {
    throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
}

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = 'Perfil';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .module-card {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 25px;
        padding: 35px;
        backdrop-filter: blur(10px);
    }

    .module-title {
        font-weight: 700;
        color: #00695C;
    }

    .btn-custom {
        background-color: #00BFA5;
        border: none;
        font-weight: bold;
        color: white;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
        color: white;
    }

    .btn-action {
        border-radius: 10px;
        padding: 4px 8px;
    }

    .btn-view { background:#17a2b8;color:white; }
    .btn-update { background:#FFC107;color:black; }
    .btn-delete { background:#dc3545;color:white; }
</style>

<div class="container mt-5">
    <div class="module-card shadow-lg">

        <div class="d-flex justify-content-between mb-4">
            <h2 class="module-title">🧑‍💼 Perfiles</h2>

            <?php if (PermisoHelper::puedeAgregar('Perfil')): ?>
                <?= Html::a('➕ Nuevo Perfil', ['create'], [
                    'class' => 'btn btn-custom rounded-pill shadow'
                ]) ?>
            <?php endif; ?>
        </div>

        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['index'],
        ]); ?>

        <div class="row mb-3">
            <div class="col-md-4">
                <?= $form->field($searchModel, 'strnombreperfil')->textInput([
                    'placeholder' => 'Buscar perfil...'
                ])->label(false) ?>
            </div>
            <div class="col-md-2">
                <?= Html::submitButton('Buscar', ['class' => 'btn btn-custom']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-hover text-center'],
            'columns' => [
                
                'strnombreperfil',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' =>
                        (PermisoHelper::puedeDetalle('Perfil') ? '{view} ' : '') .
                        (PermisoHelper::puedeEditar('Perfil') ? '{update} ' : '') .
                        (PermisoHelper::puedeEliminar('Perfil') ? '{delete}' : ''),
                    'buttons' => [
                        'view' => function ($url, $model) {
                            if (!PermisoHelper::puedeDetalle('Perfil')) return '';
                            return Html::a('👁️', ['view', 'id' => $model->id], [
                                'class' => 'btn btn-view btn-action'
                            ]);
                        },
                        'update' => function ($url, $model) {
                            if (!PermisoHelper::puedeEditar('Perfil')) return '';
                            return Html::a('✏️', ['update', 'id' => $model->id], [
                                'class' => 'btn btn-update btn-action'
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            if (!PermisoHelper::puedeEliminar('Perfil')) return '';
                            return Html::a('🗑️', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-delete btn-action',
                                'data' => [
                                    'confirm' => '¿Eliminar este perfil?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>

    </div>
</div>