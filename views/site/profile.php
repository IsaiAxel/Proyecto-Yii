<?php

use yii\helpers\Html;

$this->title = 'Mi Perfil';
$this->params['breadcrumbs'][] = 'Mi Perfil';
?>

<style>
    body {
        background: linear-gradient(135deg, #F4FFFD, #E0F2F1);
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 28px;
        padding: 35px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }

    .profile-title {
        font-weight: 800;
        color: #00695C;
        margin-bottom: 8px;
    }

    .profile-subtitle {
        color: #607D8B;
        margin-bottom: 30px;
    }

    .profile-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00BFA5, #009688);
        color: white;
        font-size: 32px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info-box {
        background: #F8FFFE;
        border: 1px solid #D9F1EC;
        border-radius: 18px;
        padding: 18px;
        height: 100%;
    }

    .info-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909C;
        margin-bottom: 6px;
        font-weight: 700;
    }

    .info-value {
        font-size: 17px;
        font-weight: 600;
        color: #004D40;
    }

    .btn-profile {
        background-color: #00BFA5;
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 999px;
        padding: 12px 24px;
    }

    .btn-profile:hover {
        background-color: #009e88;
        color: white;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="profile-card">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                    <div>
                        <h2 class="profile-title">Mi Perfil</h2>
                        <p class="profile-subtitle mb-0">
                            Consulta la información de tu cuenta dentro del sistema.
                        </p>
                    </div>

                    <div class="mt-3 mt-md-0">
                        <button class="btn btn-profile shadow" disabled>Editar perfil</button>
                    </div>
                </div>

                <div class="text-center text-md-start mb-4">
                    <div class="profile-avatar">
    <?php if (!empty($user->strimagenusuario)): ?>
        <?= Html::img(
            yii\helpers\Url::to('@web/uploads/' . $user->strimagenusuario),
            ['alt' => 'Foto de perfil']
        ) ?>
    <?php else: ?>
        <?= strtoupper(substr($user->username ?? 'U', 0, 1)) ?>
    <?php endif; ?>
</div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Usuario</div>
                            <div class="info-value"><?= Html::encode($user->username ?? 'No disponible') ?></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Correo electrónico</div>
                            <div class="info-value"><?= Html::encode($user->strcorreo ?? 'No registrado') ?></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Teléfono</div>
                            <div class="info-value"><?= Html::encode($user->strnumerocelular ?? 'No registrado') ?></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-box">
                            <div class="info-label">Estado</div>
                            <div class="info-value"><?= ($user->idestadousuario ?? 0) == 1 ? 'Activo' : 'Inactivo' ?></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="info-box">
                            <div class="info-label">Perfil asignado</div>
                            <div class="info-value">
                                <?= isset($user->perfil) && $user->perfil ? Html::encode($user->perfil->strnombreperfil) : 'No asignado' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>