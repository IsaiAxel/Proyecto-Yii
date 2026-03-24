<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalle del Módulo';
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
        margin-bottom: 15px;
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
    }

    .module-badge {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 8px 16px;
        border-radius: 999px;
        font-weight: 700;
    }
</style>

<div class="container modern-view-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="modern-view-card">

                <!-- 🔥 BOTÓN VOLVER -->
                <div class="modern-top-actions">
                    <?= Html::a('← Volver', ['index'], [
                        'class' => 'btn btn-back-modern'
                    ]) ?>
                </div>

                <div class="modern-view-header">
                    <div class="modern-view-badge">SEGURIDAD · MÓDULOS</div>
                    <h2 class="modern-view-title">🔎 Detalle del módulo</h2>
                    <p class="modern-view-subtitle">
                        Visualiza la información registrada del módulo dentro del sistema.
                    </p>
                </div>

                <div class="detail-box">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table'],
                        'attributes' => [
                            [
                                'attribute' => 'id',
                            ],
                            [
                                'attribute' => 'strnombremodulo',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="module-badge">' . Html::encode($model->strnombremodulo) . '</span>';
                                }
                            ],
                        ],
                    ]) ?>
                </div>

            </div>

        </div>
    </div>
</div>