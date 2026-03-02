<?php
/** @var yii\web\View $this */

$this->title = 'Forrajera';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .carousel-item img {
        height: 420px;
        object-fit: cover;
        border-radius: 20px;
    }

    .carousel {
        border-radius: 20px;
        overflow: hidden;
    }

    .hero-text {
        margin-top: 40px;
        padding: 40px;
        background: rgba(255,255,255,0.8);
        border-radius: 20px;
        backdrop-filter: blur(8px);
    }

    .btn-custom {
        background-color: #00BFA5;
        border: none;
        padding: 12px 35px;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #009e88;
        transform: scale(1.05);
    }

    h1 {
        color: #00695C;
    }

    .lead {
        color: #004D40;
    }
</style>

<div class="site-index">

    <div class="container mt-5">

        <!-- 🎞️ Carrusel -->
        <div id="forrajeraCarousel" class="carousel slide shadow-lg mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="<?= Yii::getAlias('@web/img/forrajera/Forraje1.jpg') ?>" class="d-block w-100" alt="Forraje">
                </div>

                <div class="carousel-item">
                    <img src="<?= Yii::getAlias('@web/img/forrajera/forraje2.jpg') ?>" class="d-block w-100" alt="Alimento animal">
                </div>

                <div class="carousel-item">
                    <img src="<?= Yii::getAlias('@web/img/forrajera/forraje3.jpg') ?>" class="d-block w-100" alt="Campo">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#forrajeraCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#forrajeraCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- 🧾 Texto -->
        <div class="text-center hero-text shadow-lg">
            <h1 class="display-5 fw-bold">Administrador de Forrajera</h1>
            <p class="lead">
                Sistema de control y gestión de productos, clientes y ventas
            </p>

            <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>"
               class="btn btn-custom btn-lg rounded-pill mt-3 shadow">
                Iniciar sesión
            </a>
        </div>

    </div>

</div>