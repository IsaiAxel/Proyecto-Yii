<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del Usuario';
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .modern-view-wrapper {
        margin-top: 40px;
        margin-bottom: 50px;
    }

    .modern-view-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 30px;
        padding: 32px;
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(224, 242, 241, 0.95);
        backdrop-filter: blur(10px);
    }

    .modern-top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 18px;
    }

    .btn-back-modern {
        background: #E0F2F1;
        color: #00695C;
        border: none;
        border-radius: 999px;
        padding: 8px 16px;
        font-weight: 600;
        transition: all .2s ease;
    }

    .btn-back-modern:hover {
        background: #B2DFDB;
        color: #004D40;
    }

    .btn-edit-modern {
        background: linear-gradient(135deg, #F4C542, #E5B937);
        border: none;
        color: #3e2f00;
        font-weight: 700;
        border-radius: 999px;
        padding: 10px 18px;
        box-shadow: 0 10px 22px rgba(229, 185, 55, 0.20);
        transition: all .2s ease;
    }

    .btn-edit-modern:hover {
        color: #3e2f00;
        transform: translateY(-1px);
    }

    .modern-view-header {
        margin-bottom: 28px;
    }

    .modern-view-badge {
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

    .modern-view-title {
        font-size: 28px;
        font-weight: 800;
        color: #00695C;
        margin-bottom: 6px;
    }

    .modern-view-subtitle {
        color: #607D8B;
        font-size: 15px;
        margin-bottom: 0;
    }

    .detail-box {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 22px;
        padding: 20px;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        color: #607D8B;
        font-weight: 700;
        width: 30%;
        border: none !important;
    }

    .table td {
        color: #004D40;
        font-weight: 600;
        border: none !important;
        vertical-align: middle;
    }

    .user-name-badge {
        display: inline-block;
        background: #F0FBF8;
        color: #00695C;
        border: 1px solid #D9F1EC;
        border-radius: 999px;
        padding: 8px 16px;
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
        padding: 8px 14px;
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

    .user-avatar-large {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 20px;
        border: 2px solid #E0F2F1;
        box-shadow: 0 8px 18px rgba(0,0,0,.08);
    }

    .user-avatar-empty {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 130px;
        height: 130px;
        border-radius: 20px;
        background: #F0FBF8;
        color: #607D8B;
        font-size: 14px;
        font-weight: 700;
        border: 1px dashed #B2DFDB;
    }
</style>

<div class="container modern-view-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="modern-view-card">

                <div class="modern-top-actions">
                    <div>
                        <?= Html::img($model->strimagenusuario, [
    'class' => 'user-avatar-large'
])?>
                    </div>
                </div>

                <div class="modern-view-header">
                    <div class="modern-view-badge">SEGURIDAD · USUARIOS</div>
                    <h2 class="modern-view-title">🔎 Detalle del usuario</h2>
                    <p class="modern-view-subtitle">
                        Visualiza la información registrada del usuario, su perfil asignado y su estado dentro del sistema.
                    </p>
                </div>

                <div class="detail-box">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table'],
                        'attributes' => [
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
                                },
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
                                },
                            ],
                            [
                                'attribute' => 'strcorreo',
                                'label' => 'Correo electrónico',
                            ],
                            [
                                'attribute' => 'strnumerocelular',
                                'label' => 'Teléfono',
                                'value' => $model->strnumerocelular ?: 'No registrado',
                            ],
                            [
                                'label' => 'Imagen',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->strimagenusuario
                                        ? Html::img('@web/uploads/' . $model->strimagenusuario, [
                                            'class' => 'user-avatar-large'
                                        ])
                                        : '<span class="user-avatar-empty">Sin imagen</span>';
                                },
                            ],
                        ],
                    ]) ?>
                </div>

            </div>

        </div>
    </div>
</div>