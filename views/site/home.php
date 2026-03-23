<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Home';
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .dashboard-wrapper {
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .dashboard-header {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 28px;
        padding: 35px;
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .dashboard-title {
        font-weight: 800;
        color: #00695C;
        margin-bottom: 8px;
    }

    .dashboard-subtitle {
        color: #4E6E6A;
        font-size: 15px;
        margin-bottom: 0;
    }

    .welcome-badge {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 8px 18px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 14px;
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 24px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        transition: all 0.25s ease;
        height: 100%;
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(0, 0, 0, 0.10);
    }

    .stats-label {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6B8B86;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .stats-value {
        font-size: 32px;
        font-weight: 800;
        color: #00695C;
        margin-bottom: 6px;
    }

    .stats-extra {
        font-size: 14px;
        color: #78909C;
    }

    .section-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    .section-title {
        font-size: 22px;
        font-weight: 700;
        color: #004D40;
        margin-bottom: 25px;
    }

    .quick-card {
        display: block;
        text-decoration: none;
        background: linear-gradient(135deg, #ffffff, #F4FFFD);
        border: 1px solid #D6F2EC;
        border-radius: 22px;
        padding: 24px;
        transition: all 0.25s ease;
        height: 100%;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.04);
    }

    .quick-card:hover {
        transform: translateY(-4px);
        border-color: #00BFA5;
        box-shadow: 0 14px 28px rgba(0, 191, 165, 0.12);
    }

    .quick-icon {
        font-size: 30px;
        margin-bottom: 12px;
    }

    .quick-title {
        font-size: 18px;
        font-weight: 700;
        color: #00695C;
        margin-bottom: 6px;
    }

    .quick-text {
        color: #607D8B;
        font-size: 14px;
        margin-bottom: 0;
    }

    .info-panel {
        background: linear-gradient(135deg, #00BFA5, #009688);
        color: white;
        border-radius: 28px;
        padding: 30px;
        box-shadow: 0 14px 35px rgba(0, 150, 136, 0.22);
        height: 100%;
    }

    .info-panel h4 {
        font-weight: 700;
        margin-bottom: 12px;
    }

    .info-panel p {
        margin-bottom: 0;
        opacity: 0.95;
    }

    .divider-space {
        height: 10px;
    }
</style>

<div class="container dashboard-wrapper">

    <div class="dashboard-header">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <div class="welcome-badge mb-3">
                    👋 Bienvenido, <?= Html::encode(Yii::$app->user->identity->username ?? 'Usuario') ?>
                </div>
                <h1 class="dashboard-title">Panel de Control</h1>
                <p class="dashboard-subtitle">
                    Administra inventario, productos y operaciones principales desde un solo lugar.
                </p>
            </div>

            <div class="text-lg-end">
                <small class="text-muted d-block">Sistema administrativo</small>
                <strong style="color:#00695C;">Forrajera</strong>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Total de productos</div>
                <div class="stats-value">25</div>
                <div class="stats-extra">Productos registrados en el sistema</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Stock total</div>
                <div class="stats-value">350 kg</div>
                <div class="stats-extra">Existencia total disponible actualmente</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Valor de inventario</div>
                <div class="stats-value">$120,000</div>
                <div class="stats-extra">Valor estimado de los productos</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="section-card">
                <h3 class="section-title">Accesos rápidos</h3>

                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="<?= Url::to(['/producto/create']) ?>" class="quick-card">
                            <div class="quick-icon">➕</div>
                            <div class="quick-title">Registrar producto</div>
                            <p class="quick-text">
                                Agrega nuevos productos al inventario con su imagen, precio, kilos y stock.
                            </p>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?= Url::to(['/producto/index']) ?>" class="quick-card">
                            <div class="quick-icon">📦</div>
                            <div class="quick-title">Ver inventario</div>
                            <p class="quick-text">
                                Consulta, edita y elimina productos registrados dentro del sistema.
                            </p>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?= Url::to(['/site/register']) ?>" class="quick-card">
                            <div class="quick-icon">🔐</div>
                            <div class="quick-title">Crear usuario</div>
                            <p class="quick-text">
                                Da de alta nuevas cuentas de acceso desde el apartado de seguridad.
                            </p>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?= Url::to(['/site/contact']) ?>" class="quick-card">
                            <div class="quick-icon">⚙️</div>
                            <div class="quick-title">Más opciones</div>
                            <p class="quick-text">
                                Accede a herramientas adicionales del sistema administrativo.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="info-panel">
                <h4>Resumen general</h4>
                <p>
                    Desde este panel puedes visualizar información clave del inventario,
                    administrar productos y mantener el acceso interno de los usuarios del sistema.
                </p>
            </div>
        </div>
    </div>

</div>