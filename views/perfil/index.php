<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    .inventory-pagination {
        margin-top: 18px;
        display: flex;
        justify-content: center;
    }

    .inventory-pagination .pagination {
        gap: 8px;
        margin: 0;
    }

    .inventory-pagination .page-link {
        border: none;
        border-radius: 14px !important;
        padding: 10px 14px;
        color: #00695C;
        background: rgba(255,255,255,.95);
        box-shadow: 0 8px 18px rgba(2,6,23,.08);
    }

    .inventory-pagination .page-item.active .page-link {
        background: #00BFA5;
        color: #fff;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="module-card shadow-lg">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="module-title">🔐 Perfiles</h2>

                    <?= Html::a('➕ Nuevo Perfil', ['create'], [
                        'class' => 'btn btn-custom rounded-pill shadow'
                    ]) ?>
                </div>

                <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    'action' => ['index'],
                    'options' => ['class' => 'mb-3'],
                ]); ?>

                <div class="row g-2 align-items-end">
                    <div class="col-md-6">
                       <?= $form->field($searchModel, 'strnombreperfil')->textInput([
    'placeholder' => 'Buscar por nombre del perfil...',
    'class' => 'form-control',
])->label(false) ?>
                    </div>

                    <div class="col-md-3">
                        <?= Html::submitButton('🔍 Buscar', ['class' => 'btn btn-custom w-100 rounded-pill shadow']) ?>
                    </div>

                    <div class="col-md-3">
                        <?= Html::a('🧹 Limpiar', ['index'], ['class' => 'btn btn-outline-dark w-100 rounded-pill shadow']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n<div class=\"inventory-pagination\">{pager}</div>\n{summary}",
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
    'attribute' => 'strnombreperfil',
    'contentOptions' => ['class' => 'fw-semibold text-success']
],
[
    'attribute' => 'bitadministrador',
    'value' => function ($model) {
        return $model->bitadministrador ? 'Sí' : 'No';
    }
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
                                            'confirm' => '¿Seguro que quieres eliminar este perfil?',
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