<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Permisos Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Seguridad'];
$this->params['breadcrumbs'][] = 'Permisos';
?>

<style>
    body {
        background: linear-gradient(135deg, #A7FFEB, #B2DFDB);
    }

    .module-card {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 25px;
        padding: 35px;
        backdrop-filter: blur(10px);
    }

    .module-title {
        font-weight: 700;
        color: #00695C;
    }

    .form-select:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0,191,165,0.25);
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background-color: #B2DFDB;
        color: #004D40;
    }

    .btn-save {
        background-color: #00BFA5;
        border: none;
        color: white;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-save:hover {
        background-color: #009e88;
        color: white;
        transform: scale(1.03);
    }

    .perfil-label {
        font-weight: 600;
        color: #004D40;
        margin-bottom: 8px;
    }

    .checkbox-cell input[type="checkbox"] {
        transform: scale(1.2);
        cursor: pointer;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="module-card shadow-lg">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="module-title">🛡️ Permisos Perfil</h2>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="perfil-select" class="perfil-label">Selecciona un perfil</label>
                        <select id="perfil-select" class="form-select">
                            <option value="">Selecciona perfil</option>
                            <?php foreach ($perfiles as $id => $nombre): ?>
                                <option value="<?= $id ?>" <?= ((string)$perfilId === (string)$id) ? 'selected' : '' ?>>
                                    <?= Html::encode($nombre) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <?php if (!empty($perfilId)): ?>

                    <?php if (empty($modulos)): ?>
                        <div class="alert alert-warning">
                            No hay módulos registrados. Primero crea módulos en el apartado <strong>Módulo</strong>.
                        </div>
                    <?php else: ?>
                        <form method="post" action="<?= Url::to(['/permisos-perfil/guardar']) ?>">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                            <input type="hidden" name="idperfil" value="<?= $perfilId ?>">

                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Módulo</th>
                                            <th>Agregar</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Consultar</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($modulos as $modulo): ?>
                                            <?php $permiso = $permisos[$modulo->id] ?? null; ?>
                                            <tr>
                                                <td class="fw-semibold text-success">
                                                    <?= Html::encode($modulo->strnombremodulo) ?>
                                                </td>

                                                <td class="checkbox-cell">
                                                    <input type="checkbox" name="permisos[<?= $modulo->id ?>][bitagregar]" <?= ($permiso && $permiso->bitagregar) ? 'checked' : '' ?>>
                                                </td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" name="permisos[<?= $modulo->id ?>][biteditar]" <?= ($permiso && $permiso->biteditar) ? 'checked' : '' ?>>
                                                </td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" name="permisos[<?= $modulo->id ?>][biteliminar]" <?= ($permiso && $permiso->biteliminar) ? 'checked' : '' ?>>
                                                </td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" name="permisos[<?= $modulo->id ?>][bitconsulta]" <?= ($permiso && $permiso->bitconsulta) ? 'checked' : '' ?>>
                                                </td>
                                                <td class="checkbox-cell">
                                                    <input type="checkbox" name="permisos[<?= $modulo->id ?>][bitdetalle]" <?= ($permiso && $permiso->bitdetalle) ? 'checked' : '' ?>>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-save btn-lg rounded-pill shadow px-4">
                                    Guardar permisos
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const perfilSelect = document.getElementById('perfil-select');

    if (!perfilSelect) return;

    perfilSelect.addEventListener('change', function () {
        const perfilId = this.value;

        if (!perfilId) {
            window.location.href = '<?= Url::to(['/permisos-perfil/asignar']) ?>';
            return;
        }

        window.location.href = '<?= Url::to(['/permisos-perfil/asignar']) ?>' + '&idperfil=' + encodeURIComponent(perfilId);
    });
});
</script>