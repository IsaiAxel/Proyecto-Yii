<?php

use yii\helpers\Html;

/** @var string $titulo */
/** @var string $breadcrumbPadre */
/** @var string $icono */

$this->title = $titulo;
$this->params['breadcrumbs'][] = ['label' => $breadcrumbPadre];
$this->params['breadcrumbs'][] = $titulo;

$datosDemo = [
    ['id' => 1, 'nombre' => 'Registro A', 'descripcion' => 'Elemento de ejemplo 1', 'estado' => 'Activo'],
    ['id' => 2, 'nombre' => 'Registro B', 'descripcion' => 'Elemento de ejemplo 2', 'estado' => 'Activo'],
    ['id' => 3, 'nombre' => 'Registro C', 'descripcion' => 'Elemento de ejemplo 3', 'estado' => 'Inactivo'],
    ['id' => 4, 'nombre' => 'Registro D', 'descripcion' => 'Elemento de ejemplo 4', 'estado' => 'Activo'],
    ['id' => 5, 'nombre' => 'Registro E', 'descripcion' => 'Elemento de ejemplo 5', 'estado' => 'Inactivo'],
];
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .module-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 28px;
        padding: 35px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
    }

    .module-title {
        font-weight: 800;
        color: #00695C;
        margin-bottom: 8px;
    }

    .module-subtitle {
        color: #607D8B;
        margin-bottom: 25px;
    }

    .btn-main {
        background-color: #00BFA5;
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 10px 20px;
        transition: .2s ease;
    }

    .btn-main:hover {
        background-color: #009e88;
        color: white;
        transform: translateY(-1px);
    }

    .btn-outline-main {
        border-radius: 999px;
        padding: 10px 20px;
        font-weight: 700;
    }

    .table-box {
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(0,0,0,.05);
    }

    .table thead {
        background-color: #B2DFDB;
        color: #004D40;
    }

    .table tbody tr:hover {
        background-color: #F1FCFA;
    }

    .tag-static {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 6px 14px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 13px;
    }

    .action-btn {
        border-radius: 10px;
        font-size: 14px;
        padding: 4px 10px;
        margin: 0 2px;
    }

    .info-panel {
        background: linear-gradient(135deg, #00BFA5, #009688);
        color: white;
        border-radius: 22px;
        padding: 22px;
        margin-top: 25px;
        box-shadow: 0 10px 25px rgba(0, 150, 136, 0.20);
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="module-card">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
                    <div>
                        <div class="tag-static mb-3">Pantalla estática de demostración</div>
                        <h2 class="module-title"><?= Html::encode($icono . ' ' . $titulo) ?></h2>
                        <p class="module-subtitle mb-0">
                            Este módulo contiene interfaz visual de CRUD sin funcionalidad a base de datos.
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-main shadow">➕ Nuevo</button>
                        <button class="btn btn-outline-secondary btn-outline-main shadow-sm">🔍 Consultar</button>
                        <button class="btn btn-outline-secondary btn-outline-main shadow-sm">📄 Detalle</button>
                    </div>
                </div>

                <div class="table-responsive table-box">
                    <table class="table table-hover align-middle text-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th style="width: 220px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datosDemo as $fila): ?>
                                <tr>
                                    <td><?= Html::encode($fila['id']) ?></td>
                                    <td class="fw-semibold text-success"><?= Html::encode($fila['nombre']) ?></td>
                                    <td><?= Html::encode($fila['descripcion']) ?></td>
                                    <td><?= Html::encode($fila['estado']) ?></td>
                                    <td>
                                        <button class="btn btn-info text-white action-btn">👁️</button>
                                        <button class="btn btn-warning action-btn">✏️</button>
                                        <button class="btn btn-danger action-btn">🗑️</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                
            </div>

        </div>
    </div>
</div>