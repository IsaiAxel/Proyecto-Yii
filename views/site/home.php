<?php
$this->title = 'Home';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 25px;
        padding: 30px;
        backdrop-filter: blur(10px);
    }

    .dashboard-title {
        font-weight: 700;
        color: #00695C;
    }

    .stat-box {
        background-color: #B2DFDB;
        border-radius: 20px;
        padding: 25px;
        transition: 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .stat-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #004D40;
    }

    .stat-number {
        font-size: 28px;
        font-weight: bold;
        color: #00695C;
    }

    .section-title {
        font-weight: 600;
        color: #004D40;
    }

    .btn-custom {
        background-color: #00BFA5;
        border: none;
        font-weight: bold;
        transition: 0.3s ease;
        color: white;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
    }

    .btn-outline-custom {
        border: 2px solid #00BFA5;
        color: #00BFA5;
        font-weight: bold;
    }

    .btn-outline-custom:hover {
        background-color: #00BFA5;
        color: white;
    }

    hr {
        border-top: 2px solid #00BFA5;
        opacity: 0.3;
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-lg-10">

        <div class="dashboard-card shadow-lg">

            <h2 class="mb-4 dashboard-title">Panel de Control</h2>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="stat-box text-center">
                        <div class="stat-title">Total Productos</div>
                        <div class="stat-number">25</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box text-center">
                        <div class="stat-title">Stock Total</div>
                        <div class="stat-number">350 kg</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box text-center">
                        <div class="stat-title">Valor Inventario</div>
                        <div class="stat-number">$120,000</div>
                    </div>
                </div>

            </div>

            <hr class="my-5">

            <h4 class="mb-4 section-title">⚡ Accesos Rápidos</h4>

            <div class="row g-4">

                <div class="col-md-6">
                    <a href="<?= \yii\helpers\Url::to(['/producto/create']) ?>" 
                       class="btn btn-custom w-100 py-3 rounded-pill shadow">
                        ➕ Registrar Nuevo Producto
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="<?= \yii\helpers\Url::to(['/producto/index']) ?>" 
                       class="btn btn-outline-custom w-100 py-3 rounded-pill shadow">
                        📋 Ver Lista de Productos
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>