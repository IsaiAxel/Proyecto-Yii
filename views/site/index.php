<?php
/** @var yii\web\View $this */

$this->title = 'Forrajera';
?>

<style>
    .carousel-item img {
        height: 420px;
        object-fit: cover;
        border-radius: 20px;
    }
    .hero-text {
        margin-top: 30px;
    }
</style>

<div class="site-index">

    <div class="container mt-5">

        <!-- 🎞️ Carrusel -->
        <div id="forrajeraCarousel" class="carousel slide shadow-lg" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="<?= Yii::getAlias('@web/img/forrajera/forrajera1.webp') ?>" class="d-block w-100" alt="Forraje">
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
        <div class="text-center hero-text">
            <h1 class="display-5 fw-bold">Administrador de Forrajera</h1>
            <p class="lead text-muted">
                Sistema de control y gestión de productos, clientes y ventas
            </p>

            <a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>"
               class="btn btn-primary btn-lg rounded-pill mt-3">
                Iniciar sesión
            </a>
        </div>

    </div>

</div>
