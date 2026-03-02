<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Inventario de Productos';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .inventory-card {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 25px;
        padding: 35px;
        backdrop-filter: blur(10px);
    }

    .inventory-title {
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

    .img-thumbnail {
        border-radius: 12px;
    }

    .btn-action {
        border-radius: 10px;
        font-size: 14px;
        padding: 4px 8px;
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

    .btn-update:hover {
        transform: scale(1.1);
    }

    .btn-delete:hover {
        transform: scale(1.1);
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

        <div class="inventory-card shadow-lg">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="inventory-title">📦 Inventario</h2>

                <?= Html::a('➕ Nuevo Producto', ['create'], [
                    'class' => 'btn btn-custom rounded-pill shadow'
                ]) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover align-middle text-center'],
                'columns' => [

                    [
                        'attribute' => 'imagen',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->imagen
                                ? \yii\helpers\Html::img($model->imagen, [
                                    'width' => '80',
                                    'class' => 'img-thumbnail shadow-sm'
                                ])
                                : '<span class="text-muted">Sin imagen</span>';
                        },
                    ],

                    [
                        'attribute' => 'nombre',
                        'contentOptions' => ['class' => 'fw-semibold text-success']
                    ],

                    'kilos',

                    [
                        'attribute' => 'precio',
                        'value' => function ($model) {
                            return '$ ' . number_format($model->precio, 2);
                        }
                    ],

                    'stock',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acciones',
                        'template' => '{update} {delete}',
                        'buttons' => [

                            'update' => function ($url, $model) {
                                return Html::a('✏️', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-update btn-action me-1'
                                ]);
                            },

                            'delete' => function ($url, $model) {
                                return Html::a('🗑️', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-delete btn-action',
                                    'data' => [
                                        'confirm' => '¿Seguro que quieres eliminar este producto?',
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