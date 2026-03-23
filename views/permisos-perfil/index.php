<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Permisos Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = 'Permisos Perfil';
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
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
        color: white;
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background-color: #B2DFDB;
        color: #004D40;
    }

    .table-hover tbody tr:hover {
        background-color: #E0F2F1;
    }

    .btn-action {
        border-radius: 10px;
        font-size: 14px;
        padding: 4px 8px;
    }

    .btn-view {
        background-color: #17a2b8;
        border: none;
        color: white;
    }

    .btn-update {
        background-color: #FFC107;
        border: none;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    .module-pagination {
        margin-top: 18px;
        display: flex;
        justify-content: center;
    }

    .module-pagination .pagination {
        gap: 8px;
        margin: 0;
    }

    .module-pagination .page-link {
        border: none;
        border-radius: 14px !important;
        padding: 10px 14px;
        color: #00695C;
        background: rgba(255,255,255,.95);
        box-shadow: 0 8px 18px rgba(2,6,23,.08);
    }

    .module-pagination .page-item.active .page-link {
        background: #00BFA5;
        color: #fff;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="module-card shadow-lg">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="module-title">🛡️ Permisos Perfil</h2>

                    <?= Html::a('➕ Nuevo Permiso', ['create'], [
                        'class' => 'btn btn-custom rounded-pill shadow'
                    ]) ?>
                </div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n<div class=\"module-pagination\">{pager}</div>\n{summary}",
                    'tableOptions' => ['class' => 'table table-hover align-middle text-center'],
                    'pager' => [
                        'options' => ['class' => 'pagination'],
                        'linkOptions' => ['class' => 'page-link'],
                        'activePageCssClass' => 'active',
                        'disabledPageCssClass' => 'disabled',
                        'maxButtonCount' => 5,
                        'prevPageLabel' => '‹',
                        'nextPageLabel' => '›',
                        'firstPageLabel' => '«',
                        'lastPageLabel' => '»',
                    ],
                    'columns' => [
                        'id',
                        [
                            'label' => 'Perfil',
                            'value' => function ($model) {
                                return $model->perfil ? $model->perfil->strnombreperfil : 'N/A';
                            }
                        ],
                        [
                            'label' => 'Módulo',
                            'value' => function ($model) {
                                return $model->modulo ? $model->modulo->strnombremodulo : 'N/A';
                            }
                        ],
                        [
                            'attribute' => 'bitagregar',
                            'value' => fn($model) => $model->bitagregar ? 'Sí' : 'No',
                        ],
                        [
                            'attribute' => 'biteditar',
                            'value' => fn($model) => $model->biteditar ? 'Sí' : 'No',
                        ],
                        [
                            'attribute' => 'bitconsulta',
                            'value' => fn($model) => $model->bitconsulta ? 'Sí' : 'No',
                        ],
                        [
                            'attribute' => 'biteliminar',
                            'value' => fn($model) => $model->biteliminar ? 'Sí' : 'No',
                        ],
                        [
                            'attribute' => 'bitdetalle',
                            'value' => fn($model) => $model->bitdetalle ? 'Sí' : 'No',
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Acciones',
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('👁️', ['view', 'id' => $model->id], [
                                        'class' => 'btn btn-view btn-action me-1'
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('✏️', ['update', 'id' => $model->id], [
                                        'class' => 'btn btn-update btn-action me-1'
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('🗑️', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-delete btn-action',
                                        'data' => [
                                            'confirm' => '¿Seguro que quieres eliminar este permiso?',
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
    </div>
</div>