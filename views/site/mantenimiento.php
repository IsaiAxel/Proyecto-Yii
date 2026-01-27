<?php
use yii\helpers\Html;

$this->title = 'Mantenimiento';
$this->params['breadcrumbs'][] = ['label' => 'Hola Mundo', 'url' => ['site/contact']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-warning">
                <div class="card-body text-center p-5">

                    <h1 class="text-warning mb-3">🛠 Mantenimiento</h1>

                    <p class="fs-5">
                        Esta sección se encuentra actualmente en mantenimiento.
                    </p>

                    <p class="text-muted">
                        Por favor, regresa más tarde.
                    </p>

                    <?= Html::a(
                        '⬅ Volver',
                        ['site/contact'],
                        ['class' => 'btn btn-secondary mt-3']
                    ) ?>

                </div>
            </div>

        </div>
    </div>
</div>
