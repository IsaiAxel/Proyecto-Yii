<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\ForbiddenHttpException;
use app\components\PermisoHelper;

if (!PermisoHelper::puedeVerModulo('Usuario')) {
    throw new ForbiddenHttpException('No tienes permiso para acceder a este módulo.');
}

$this->title = 'Usuarios';
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .modern-module-wrapper {
        margin-top: 40px;
        margin-bottom: 50px;
    }

    .modern-module-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 30px;
        padding: 32px;
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(224, 242, 241, 0.95);
        backdrop-filter: blur(10px);
    }

    .modern-module-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        flex-wrap: wrap;
        margin-bottom: 26px;
    }

    .modern-module-badge {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 12px;
    }

    .modern-module-title {
        font-size: 30px;
        font-weight: 800;
        color: #00695C;
        margin-bottom: 8px;
    }

    .modern-module-subtitle {
        color: #607D8B;
        font-size: 15px;
        margin-bottom: 0;
    }

    .btn-create-modern {
        background: linear-gradient(135deg, #00BFA5, #009688);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 22px;
        box-shadow: 0 10px 22px rgba(0, 150, 136, 0.20);
        transition: all .2s ease;
    }

    .btn-create-modern:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 14px 24px rgba(0, 150, 136, 0.24);
    }

    .search-panel {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 22px;
        padding: 20px;
        margin-bottom: 24px;
    }

    .search-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .search-panel .form-control {
        border-radius: 16px;
        padding: 13px 15px;
        border: 1px solid #D9F1EC;
        box-shadow: none;
        transition: all .2s ease;
    }

    .search-panel .form-control:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0, 191, 165, 0.16);
    }

    .btn-search-modern {
        background: #00BFA5;
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 20px;
        transition: all .2s ease;
    }

    .btn-search-modern:hover {
        background: #009e88;
        color: white;
    }

    .btn-clear-modern {
        border-radius: 999px;
        padding: 12px 20px;
        font-weight: 700;
    }

    .table-responsive {
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,.05);
    }

    .table {
        margin-bottom: 0;
        background: white;
    }

    .table thead {
        background: linear-gradient(135deg, #B2DFDB, #A7FFEB);
        color: #004D40;
    }

    .table thead th {
        border: none !important;
        font-weight: 800;
        padding: 16px 14px;
        font-size: 14px;
        text-align: center;
        vertical-align: middle;
    }

    .table tbody td {
        vertical-align: middle;
        border-color: #EEF7F5;
        padding: 15px 12px;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: #F2FCFA;
    }

    .user-avatar-thumb {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        object-fit: cover;
        border: 2px solid #E0F2F1;
        box-shadow: 0 6px 14px rgba(0,0,0,.08);
    }

    .user-avatar-empty {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: #F0FBF8;
        color: #607D8B;
        font-size: 12px;
        font-weight: 700;
        border: 1px dashed #B2DFDB;
    }

    .user-name-badge {
        display: inline-block;
        background: #F0FBF8;
        color: #00695C;
        border: 1px solid #D9F1EC;
        border-radius: 999px;
        padding: 8px 14px;
        font-weight: 700;
    }

    .profile-badge {
        display: inline-block;
        background: #EEF7FF;
        color: #24577A;
        border: 1px solid #D7EAF8;
        border-radius: 999px;
        padding: 8px 14px;
        font-weight: 700;
    }

    .status-badge {
        display: inline-block;
        border-radius: 999px;
        padding: 7px 14px;
        font-weight: 700;
        font-size: 13px;
    }

    .status-active {
        background: #E3FCEC;
        color: #0B7A3E;
        border: 1px solid #C8F2D8;
    }

    .status-inactive {
        background: #FFF3E0;
        color: #8A5A00;
        border: 1px solid #FFE0B2;
    }

    .email-text,
    .phone-text {
        color: #455A64;
        font-weight: 600;
    }

    .btn-action {
        border-radius: 12px;
        font-size: 14px;
        padding: 6px 10px;
        border: none;
        transition: all .2s ease;
    }

    .btn-action:hover {
        transform: translateY(-1px);
    }

    .btn-view {
        background: #4DA8B8;
        color: white;
    }

    .btn-view:hover {
        background: #3f95a4;
        color: white;
    }

    .btn-update {
        background: #F4C542;
        color: #3e2f00;
    }

    .btn-update:hover {
        background: #e5b937;
        color: #3e2f00;
    }

    .btn-delete {
        background: #D64550;
        color: white;
    }

    .btn-delete:hover {
        background: #c53a45;
        color: white;
    }

    .modern-module-pagination {
        margin-top: 22px;
        display: flex;
        justify-content: center;
    }

    .modern-module-pagination .pagination {
        gap: 8px;
        margin: 0;
    }

    .modern-module-pagination .page-link {
        border: none;
        border-radius: 14px !important;
        padding: 10px 14px;
        color: #00695C;
        background: rgba(255,255,255,.98);
        box-shadow: 0 8px 18px rgba(2,6,23,.08);
        font-weight: 600;
    }

    .modern-module-pagination .page-item.active .page-link {
        background: #00BFA5;
        color: #fff;
    }

    .modern-summary {
        margin-top: 14px;
        color: #607D8B;
        font-size: 14px;
        text-align: center;
    }

    .empty-state {
        background: #F8FFFE;
        border: 1px dashed #B2DFDB;
        border-radius: 20px;
        padding: 24px;
        text-align: center;
        color: #607D8B;
        font-weight: 600;
    }
</style>

<div class="container modern-module-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="modern-module-card">
                <div class="modern-module-header">
                    <div>
                        <div class="modern-module-badge">SEGURIDAD · USUARIOS</div>
                        <h2 class="modern-module-title">👤 Gestión de usuarios</h2>
                        <p class="modern-module-subtitle">
                            Administra las cuentas del sistema, su perfil asignado, estado, imagen y datos de contacto.
                        </p>
                    </div>

                    <div>
                        <?php if (PermisoHelper::puedeAgregar('Usuario')): ?>
                            <?= Html::a('➕ Nuevo usuario', ['create'], [
                                'class' => 'btn btn-create-modern'
                            ]) ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="search-panel">
                    <div class="search-title">Búsqueda de usuarios</div>

                    <?php $form = ActiveForm::begin([
                        'method' => 'get',
                        'action' => ['index'],
                        'options' => ['class' => 'mb-0'],
                    ]); ?>

                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <?= $form->field($searchModel, 'username')->textInput([
                                'placeholder' => 'Buscar por usuario...',
                                'class' => 'form-control',
                            ])->label(false) ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($searchModel, 'strcorreo')->textInput([
                                'placeholder' => 'Buscar por correo...',
                                'class' => 'form-control',
                            ])->label(false) ?>
                        </div>

                        <div class="col-md-2">
                            <?= Html::submitButton('🔍 Buscar', [
                                'class' => 'btn btn-search-modern w-100'
                            ]) ?>
                        </div>

                        <div class="col-md-2">
                            <?= Html::a('🧹 Limpiar', ['index'], [
                                'class' => 'btn btn-outline-secondary btn-clear-modern w-100'
                            ]) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

                <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => "{items}\n<div class=\"modern-module-pagination\">{pager}</div>\n<div class=\"modern-summary\">{summary}</div>",
                        'tableOptions' => ['class' => 'table table-hover align-middle'],
                        'emptyText' => '<div class="empty-state">No se encontraron usuarios registrados.</div>',
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
                            [
                                'label' => 'Imagen',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->strimagenusuario
                                        ? Html::img('@web/uploads/' . $model->strimagenusuario, [
                                            'class' => 'user-avatar-thumb'
                                        ])
                                        : '<span class="user-avatar-empty">Sin foto</span>';
                                }
                            ],
                            [
                                'attribute' => 'username',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="user-name-badge">' . Html::encode($model->username) . '</span>';
                                }
                            ],
                            [
                                'label' => 'Perfil',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $perfil = $model->perfil ? $model->perfil->strnombreperfil : 'N/A';
                                    return '<span class="profile-badge">' . Html::encode($perfil) . '</span>';
                                }
                            ],
                            [
                                'attribute' => 'idestadousuario',
                                'label' => 'Estado',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ((int)$model->idestadousuario === 1) {
                                        return '<span class="status-badge status-active">Activo</span>';
                                    }

                                    return '<span class="status-badge status-inactive">Inactivo</span>';
                                }
                            ],
                            [
                                'attribute' => 'strcorreo',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="email-text">' . Html::encode($model->strcorreo) . '</span>';
                                }
                            ],
                            [
                                'attribute' => 'strnumerocelular',
                                'label' => 'Teléfono',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="phone-text">' . Html::encode($model->strnumerocelular ?: 'No registrado') . '</span>';
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Acciones',
                                'template' =>
                                    (PermisoHelper::puedeDetalle('Usuario') ? '{view} ' : '') .
                                    (PermisoHelper::puedeEditar('Usuario') ? '{update} ' : '') .
                                    (PermisoHelper::puedeEliminar('Usuario') ? '{delete}' : ''),
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        if (!PermisoHelper::puedeDetalle('Usuario')) {
                                            return '';
                                        }

                                        return Html::a('👁️', ['view', 'id' => $model->id], [
                                            'class' => 'btn btn-view btn-action me-1'
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        if (!PermisoHelper::puedeEditar('Usuario')) {
                                            return '';
                                        }

                                        return Html::a('✏️', ['update', 'id' => $model->id], [
                                            'class' => 'btn btn-update btn-action me-1'
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        if (!PermisoHelper::puedeEliminar('Usuario')) {
                                            return '';
                                        }

                                        return Html::a('🗑️', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-delete btn-action',
                                            'data' => [
                                                'confirm' => '¿Seguro que quieres eliminar este usuario?',
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
</div>