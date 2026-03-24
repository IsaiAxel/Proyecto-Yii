<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Permisos Perfil';
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .modern-module-wrapper {
        margin-top: 40px;
        margin-bottom: 50px;
    }

    .modern-module-card {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 30px;
        padding: 32px;
        box-shadow: 0 14px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(224, 242, 241, 0.95);
        backdrop-filter: blur(10px);
    }

    .modern-module-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        flex-wrap: wrap;
        margin-bottom: 26px;
    }

    .modern-module-badge {
        display: inline-block;
        background: #E0F7F4;
        color: #00695C;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 12px;
    }

    .modern-module-title {
        font-size: 30px;
        font-weight: 800;
        color: #00695C;
        margin-bottom: 8px;
    }

    .modern-module-subtitle {
        color: #607D8B;
        font-size: 15px;
        margin-bottom: 0;
    }

    .selector-panel {
        background: #F8FFFE;
        border: 1px solid #E0F2F1;
        border-radius: 22px;
        padding: 20px;
        margin-bottom: 24px;
    }

    .selector-title {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .perfil-label {
        font-weight: 700;
        color: #004D40;
        margin-bottom: 8px;
    }

    .form-select {
        border-radius: 16px;
        padding: 13px 15px;
        border: 1px solid #D9F1EC;
        box-shadow: none;
        transition: all .2s ease;
    }

    .form-select:focus {
        border-color: #00BFA5;
        box-shadow: 0 0 0 0.2rem rgba(0,191,165,0.16);
    }

    .alert-custom {
        background: #FFF8E1;
        border: 1px solid #FFE082;
        color: #6D4C41;
        border-radius: 18px;
        padding: 16px 18px;
        font-weight: 600;
    }

    .table-responsive {
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,.05);
    }

    .table {
        margin-bottom: 0;
        background: white;
    }

    .table thead {
        background: linear-gradient(135deg, #B2DFDB, #A7FFEB);
        color: #004D40;
    }

    .table thead th {
        border: none !important;
        font-weight: 800;
        padding: 16px 14px;
        font-size: 14px;
        text-align: center;
        vertical-align: middle;
    }

    .table tbody td {
        vertical-align: middle;
        border-color: #EEF7F5;
        padding: 16px 12px;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: #F2FCFA;
    }

    .module-name-badge {
        display: inline-block;
        background: #F0FBF8;
        color: #00695C;
        border: 1px solid #D9F1EC;
        border-radius: 999px;
        padding: 8px 14px;
        font-weight: 700;
    }

    .checkbox-cell input[type="checkbox"] {
        transform: scale(1.18);
        cursor: pointer;
        accent-color: #00BFA5;
    }

    .save-panel {
        margin-top: 24px;
        display: flex;
        justify-content: flex-end;
    }

    .btn-save-modern {
        background: linear-gradient(135deg, #00BFA5, #009688);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 24px;
        box-shadow: 0 10px 22px rgba(0, 150, 136, 0.20);
        transition: all .2s ease;
    }

    .btn-save-modern:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 14px 24px rgba(0, 150, 136, 0.24);
    }

    .hint-panel {
        background: linear-gradient(135deg, #00BFA5, #009688);
        color: white;
        border-radius: 22px;
        padding: 18px 22px;
        margin-top: 22px;
        box-shadow: 0 10px 25px rgba(0,150,136,.20);
    }

    .hint-panel h6 {
        font-weight: 800;
        margin-bottom: 8px;
    }

    .hint-panel p {
        margin-bottom: 0;
    }
</style>

<div class="container modern-module-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="modern-module-card">
                <div class="modern-module-header">
                    <div>
                        <div class="modern-module-badge">SEGURIDAD · PERMISOS</div>
                        <h2 class="modern-module-title">🛡️ Asignación de permisos por perfil</h2>
                        <p class="modern-module-subtitle">
                            Selecciona un perfil y define qué acciones puede realizar en cada módulo del sistema.
                        </p>
                    </div>
                </div>

                <div class="selector-panel">
                    <div class="selector-title">Selección de perfil</div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="perfil-select" class="perfil-label">Perfil</label>
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
                </div>

                <?php if (!empty($perfilId)): ?>

                    <?php if (empty($modulos)): ?>
                        <div class="alert-custom">
                            No hay módulos registrados. Primero crea módulos en el apartado <strong>Módulo</strong>.
                        </div>
                    <?php else: ?>
                        <form method="post" action="<?= Url::to(['/permisos-perfil/guardar']) ?>">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                            <input type="hidden" name="idperfil" value="<?= $perfilId ?>">

                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
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
                                                <td>
                                                    <span class="module-name-badge">
                                                        <?= Html::encode($modulo->strnombremodulo) ?>
                                                    </span>
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

                            <div class="save-panel">
                                <button type="submit" class="btn btn-save-modern">
                                    Guardar permisos
                                </button>
                            </div>
                        </form>

                        <div class="hint-panel">
                            <h6>Tip de configuración</h6>
                            <p>
                                Activa <strong>Consultar</strong> para que el perfil pueda ver el módulo. Después habilita
                                solo las acciones necesarias para crear, editar, eliminar o ver detalle.
                            </p>
                        </div>
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