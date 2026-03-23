<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use app\components\PermisoHelper;
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

    $items = [];

    $items[] = ['label' => 'Home', 'url' => ['/site/home']];

    // Si quieres conservar Productos por ahora, lo dejamos fijo
    $items[] = [
        'label' => 'Productos',
        'items' => [
            ['label' => 'Registrar Producto', 'url' => ['/producto/create']],
            ['label' => 'Lista de Productos', 'url' => ['/producto/index']],
        ],
    ];

    // ===== SEGURIDAD =====
    $seguridadItems = [];

    if (PermisoHelper::puedeVerModulo('Perfil')) {
        $seguridadItems[] = ['label' => 'Perfil', 'url' => ['/perfil/index']];
    }

    if (PermisoHelper::puedeVerModulo('Modulo')) {
        $seguridadItems[] = ['label' => 'Módulo', 'url' => ['/modulo/index']];
    }

    if (PermisoHelper::puedeVerModulo('Permisos')) {
        $seguridadItems[] = ['label' => 'Permisos', 'url' => ['/permisos-perfil/asignar']];
    }

    if (PermisoHelper::puedeVerModulo('Usuario')) {
        $seguridadItems[] = ['label' => 'Usuarios', 'url' => ['/user/index']];
    }

    if (!empty($seguridadItems)) {
        $items[] = [
            'label' => 'Seguridad',
            'items' => $seguridadItems,
        ];
    }

    // ===== PRINCIPAL 1 =====
    $principal1Items = [];

    if (PermisoHelper::puedeVerModulo('Principal 1.1')) {
        $principal1Items[] = ['label' => 'Principal 1.1', 'url' => ['/site/principal11']];
    }

    if (PermisoHelper::puedeVerModulo('Principal 1.2')) {
        $principal1Items[] = ['label' => 'Principal 1.2', 'url' => ['/site/principal12']];
    }

    if (!empty($principal1Items)) {
        $items[] = [
            'label' => 'Principal 1',
            'items' => $principal1Items,
        ];
    }

    // ===== PRINCIPAL 2 =====
    $principal2Items = [];

    if (PermisoHelper::puedeVerModulo('Principal 2.1')) {
        $principal2Items[] = ['label' => 'Principal 2.1', 'url' => ['/site/principal21']];
    }

    if (PermisoHelper::puedeVerModulo('Principal 2.2')) {
        $principal2Items[] = ['label' => 'Principal 2.2', 'url' => ['/site/principal22']];
    }

    if (!empty($principal2Items)) {
        $items[] = [
            'label' => 'Principal 2',
            'items' => $principal2Items,
        ];
    }

    // ===== PERFIL =====
    $items[] = [
        'label' => '👤 Bienvenido, ' . Html::encode(Yii::$app->user->identity->username),
        'encode' => false,
        'items' => [
            ['label' => 'Mi perfil', 'url' => ['/site/profile']],
            '<div class="dropdown-divider"></div>',
            [
                'label' => 'Cerrar sesión',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post'],
            ],
        ],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto align-items-lg-center'],
        'items' => $items,
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