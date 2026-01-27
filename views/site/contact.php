<?php
use yii\helpers\Html;

$this->title = 'Hola Mundo';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-body text-center p-4">

                    <h1 class="mb-3">👋 Hola Mundo</h1>

                    <p class="text-muted mb-4">
                        Esta es una vista de ejemplo usando el apartado de <b>Contact</b> en Yii2.
                    </p>

                    <div class="d-grid gap-3">
                        <?= Html::button(
                            '💾 Insertar en base de datos',
                            [
                                'class' => 'btn btn-success btn-lg',
                                'onclick' => "alert('✅ Se ha insertado correctamente en la base de datos');"
                            ]
                        ) ?>

                        <?= Html::a(
                            '🛠 Ir a mantenimiento',
                            ['site/mantenimiento'],
                            ['class' => 'btn btn-outline-warning btn-lg']
                        ) ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
