<?php

use yii\helpers\Html;

$this->title = 'Error';
?>

<style>
    body {
        background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .error-card {
        background: white;
        border-radius: 30px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        max-width: 500px;
        width: 90%;
    }

    .error-icon {
        font-size: 60px;
        margin-bottom: 15px;
    }

    .error-title {
        font-size: 26px;
        font-weight: bold;
        color: #C62828;
    }

    .error-message {
        color: #555;
        margin-top: 10px;
        margin-bottom: 25px;
    }

    .btn-home {
        background: #C62828;
        color: white;
        padding: 12px 25px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-home:hover {
        background: #B71C1C;
        color: white;
    }
</style>

<div class="error-card">
    <div class="error-icon">⚠️</div>

    <div class="error-title">
        Ocurrió un problema
    </div>

    <div class="error-message">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <a href="<?= Yii::$app->homeUrl ?>" class="btn-home">
        Volver al inicio
    </a>
</div>