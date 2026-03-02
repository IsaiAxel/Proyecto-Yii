<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">

<?php $this->beginBody() ?>

<?php if (!Yii::$app->user->isGuest): ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow'
        ]
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/home']],
            [
                'label' => 'Productos',
                'items' => [
                    ['label' => 'Registrar Producto', 'url' => ['/producto/create']],
                    ['label' => 'Lista de Productos', 'url' => ['/producto/index']],
                ],
            ],
            ['label' => 'Hola Mundo', 'url' => ['/site/contact']],
            [
                'label' => 'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ],
    ]);

    NavBar::end();
    ?>
</header>

<?php endif; ?>


<main class="flex-shrink-0 <?= Yii::$app->user->isGuest ? 'vh-100 d-flex justify-content-center align-items-center' : 'pt-5 mt-4' ?>" role="main">

    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="container mt-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>

</main>


<?php if (!Yii::$app->user->isGuest): ?>

<footer class="mt-auto py-3 bg-light border-top">
    <div class="container text-center text-muted">
        &copy; <?= Yii::$app->name ?> <?= date('Y') ?> | <?= Yii::powered() ?>
    </div>
</footer>

<?php endif; ?>


<?php $this->endBody() ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Reemplaza el confirm nativo de Yii por SweetAlert2
  document.addEventListener("DOMContentLoaded", function () {
    if (typeof yii === "undefined") return;

    yii.confirm = function (message, ok, cancel) {
      Swal.fire({
        title: "Confirmar acción",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
        reverseButtons: true
      }).then(function (result) {
        if (result.isConfirmed) {
          ok();
        } else {
          cancel && cancel();
        }
      });
    };
  });
</script>
</body>
</html>
<?php $this->endPage() ?>